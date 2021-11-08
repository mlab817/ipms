<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Project;
use App\Models\ProjectRegionInfrastructure;
use App\Models\ProjectReview;
use App\Models\RefPipolStatus;
use App\Models\RefRegion;
use App\Models\RefSubmissionStatus;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $bySubmissionStatus = RefSubmissionStatus::withCount(['projects' => function($query) {
            $query->byRole();
        }])->get();

        $infraCostByRegion = ProjectRegionInfrastructure::whereIn('project_id', Project::byRole()->get()->pluck('id')->toArray())
            ->join('projects','projects.id','=','project_region_infrastructures.project_id')
            ->join('ref_regions', 'ref_regions.id','=','project_region_infrastructures.ref_region_id')
            ->selectRaw('ref_regions.label as region, SUM(y2022) AS y2022, SUM(y2023) AS y2023, SUM(y2024) AS y2024, SUM(y2025) AS y2025, SUM(y2026) AS y2026')
            ->where('projects.ref_submission_status_id', '<>', RefSubmissionStatus::findByName('Dropped')->id)
            ->groupBy('ref_region_id')
            ->get();

        $byPipolStatus = RefPipolStatus::withCount(['projects' => function($query) {
            $query->byRole();
        }])->get()
            ->map(function($p) {
                $p->label = $p->projects_count . ' ' . strtolower($p->name);
                return $p;
            });

        $auditLogs  = AuditLog::where('auditable_type','App\\Models\\Project')
            ->whereIn('auditable_id', Project::byRole()->get()->pluck('id'))
            ->groupBy('date')
            ->orderBy('date','asc')
            ->get([
                DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'),
                DB::raw('COUNT(id) as count'),
            ]);

        $dates = $this->generateDateRange(Carbon::now()->subDays(7), Carbon::now());

        $datesArray = collect([]);

        foreach ($dates as $date) {
            $datesArray->push($date->toDateString());
        }

        $data = [];

        foreach ($datesArray as $date) {
            $data[$date] = $auditLogs->where('date', $date)->first()->count ?? 0;
        }

        return view('dashboard', [
            'byPipolStatus'         => $byPipolStatus,
            'projectCount'          => Project::byRole()->count(),
            'validatedCount'        => Project::byRole()->validated()->count(),
            'bySubmissionStatus'    => $bySubmissionStatus,
            'infraCostByRegion'     => $infraCostByRegion,
            'auditLogs'             => $data,
        ]);
    }

    public function generateDateRange($startDate, $endDate): CarbonPeriod
    {
        return CarbonPeriod::create($startDate, $endDate);
    }
}
