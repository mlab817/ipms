<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectRegionInfrastructure;
use App\Models\ProjectReview;
use App\Models\RefPipolStatus;
use App\Models\RefRegion;
use App\Models\RefSubmissionStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $bySubmissionStatus = RefSubmissionStatus::withCount('projects')->get();

        $infraCostByRegion = ProjectRegionInfrastructure::whereIn('project_id', Project::all()->pluck('id')->toArray())
            ->join('projects','projects.id','=','project_region_infrastructures.project_id')
            ->join('ref_regions', 'ref_regions.id','=','project_region_infrastructures.ref_region_id')
            ->selectRaw('ref_regions.label as region, SUM(y2022) AS y2022, SUM(y2023) AS y2023, SUM(y2024) AS y2024, SUM(y2025) AS y2025, SUM(y2026) AS y2026')
            ->where('projects.ref_submission_status_id', '<>', RefSubmissionStatus::findByName('Dropped')->id)
            ->groupBy('ref_region_id')
            ->get();

        $byPipolStatus = RefPipolStatus::withCount('projects')->get()
            ->map(function($p) {
                $p->label = $p->projects_count . ' ' . strtolower($p->name);
                return $p;
            });

        return view('dashboard', [
            'byPipolStatus'         => $byPipolStatus,
            'projectCount'          => Project::count(),
            'validatedCount'        => Project::validated()->count(),
            'bySubmissionStatus'    => $bySubmissionStatus,
            'infraCostByRegion'     => $infraCostByRegion
        ]);
    }
}
