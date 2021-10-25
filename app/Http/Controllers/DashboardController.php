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
    public function __invoke()
    {
        $bySubmissionStatus = RefSubmissionStatus::withCount('projects')->get();

        $infraCostByRegion = ProjectRegionInfrastructure::whereIn('project_id', Project::all()->pluck('id')->toArray())
            ->join('ref_regions', 'ref_regions.id','=','project_region_infrastructures.ref_region_id')
            ->selectRaw('ref_regions.label as region, SUM(y2022) AS y2022, SUM(y2023) AS y2023, SUM(y2024) AS y2024, SUM(y2025) AS y2025, SUM(y2026) AS y2026')
            ->groupBy('ref_region_id')
            ->get();

        $byPipolStatus = RefPipolStatus::withCount('projects')->get()
            ->map(function($p) {
                $p->label = $p->projects_count . ' ' . strtolower($p->name);
                return $p;
            });

        // get daily data of added projects
        $chartData = DB::table('projects')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->orderBy('date','ASC')
            ->groupBy('date')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->date  => $item->count];
            });

        return view('dashboard', [
            'byPipolStatus' => $byPipolStatus,
            'projectCount'  => Project::count(),
            'reviewCount'   => Project::has('review')->count(),
//            'encodedCount'  => Project::has('pipol')->count(),
            'pipCount'      => Project::whereHas('review', function ($q) {
                $q->where('pip', 1);
            })->count(),
            'encodedCount'  => Project::whereHas('review', function ($q) {
                $q->where('pip', 1);
            })->has('pipol')->count(),
            'tripCount'      => Project::whereHas('review', function ($q) {
                $q->where('trip', 1);
            })->count(),
//            'encodedCount'  => ProjectReview::where('pipol_encoded', true)->count(),
//            'validatedCount'=> ProjectReview::where('pipol_validated', true)->count(),
//            'finalizedCount'=> ProjectReview::where('pipol_finalized', true)->count(),
            'endorsedCount' => Project::whereHas('review', function ($q) {
                $q->where('pip', 1);
            })->whereHas('pipol', function ($q) {
                $q->where('submission_status','Endorsed');
            })->count(),
            'draftCount' => Project::whereHas('review', function ($q) {
                $q->where('pip', 1);
            })->whereHas('pipol', function ($q) {
                $q->where('submission_status','Draft');
            })->count(),
            'userCount'     => User::count(),
            'chart'         => [],
            'reviews'       => ProjectReview::with('user')->has('project')->latest()->take(5)->get(),
            'latestProjects'=> Project::with('pap_type','project_status','creator.office','office')->latest()->take(5)->get(),
            'users'         => User::whereHas('roles', function ($q) {
                $q->where('name','reviewer.main')
                    ->orWhere('name','reviewer');
            })->withCount('projects','reviews')->get(),
            'bySubmissionStatus' => $bySubmissionStatus,
            'validated' => Project::whereNotNull('validated_at')->count(),
            'infraCostByRegion' => $infraCostByRegion
        ]);
    }
}
