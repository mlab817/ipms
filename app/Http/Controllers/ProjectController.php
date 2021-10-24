<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectDropRequest;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Jobs\ProjectUpdateJob;
use App\Models\RefApprovalLevel;
use App\Models\RefBasis;
use App\Models\RefCipType;
use App\Models\RefCovidIntervention;
use App\Models\RefFsStatus;
use App\Models\RefFundingInstitution;
use App\Models\RefFundingSource;
use App\Models\RefGad;
use App\Models\RefImplementationMode;
use App\Models\RefInfrastructureSector;
use App\Models\Office;
use App\Models\RefOperatingUnit;
use App\Models\RefOperatingUnitType;
use App\Models\RefPapType;
use App\Models\RefPdpChapter;
use App\Models\RefPdpIndicator;
use App\Models\RefPipolStatus;
use App\Models\RefPipTypology;
use App\Models\RefPreparationDocument;
use App\Models\Project;
use App\Models\RefPrerequisite;
use App\Models\RefProjectStatus;
use App\Models\RefReadinessLevel;
use App\Models\RefRegion;
use App\Models\RefSdg;
use App\Models\RefSpatialCoverage;
use App\Models\RefSubmissionStatus;
use App\Models\RefTenPointAgenda;
use App\Models\RefTier;
use App\Models\RefYear;
use App\Notifications\ProjectDeletedNotification;
use App\Services\ProjectCheckForIssuesService;
use App\Services\ProjectCreateService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Searchable\Search;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $projectQuery = Project::query()->with(['office','creator.office','project_status','pipol']);
        $q = $request->q;
        $status = RefSubmissionStatus::findByName($request->status ?? '');

        if ($status) {
            $projectQuery->where('ref_submission_status_id', $status->id);
        }

        if ($q) {
            $projectQuery->where('title','like', '%'. $q . '%');
        }

        $projects = $projectQuery->paginate();

        return view('projects.index', compact('projects'))
            ->with([
                'submission_statuses'=> RefSubmissionStatus::withCount('projects')->get(),
                'totalProjectsCount' => Project::count(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $project = new Project;

        return view('projects.create', compact('project'))
            ->with('pageTitle', 'Add New Project')
            ->with([
                'offices'                   => Office::all(),
                'pap_types'                 => RefPapType::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreRequest $request
     * @return Response
     * @throws \Exception
     */
    public function store(ProjectStoreRequest $request, ProjectCreateService $service, ProjectCheckForIssuesService $checkForIssuesService)
    {
        $project = $service->execute($request->validated(), auth()->id());

//        event(new ProjectCreatedEvent($project));

        $checkForIssuesService->execute($project->toArray(), $project->id, $project->updated_at);

        return redirect()->route('projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function show(Project $project)
    {
        $project->load(
            'regions',
            'region_investments.region',
            'region_infrastructures.region',
            'fs_investments.funding_source',
            'fs_infrastructures.funding_source',
            'bases',
            'disbursement',
            'nep',
            'allocation',
            'feasibility_study',
            'right_of_way',
            'resettlement_action_plan',
            'ten_point_agendas',
            'sdgs',
            'pdp_chapters',
            'pdp_indicators',
            'operating_units');

        $tab = 'profile';

        return view('projects.show', compact('project','tab'))
            ->with([
                'submission_statuses' => RefSubmissionStatus::all(),
                'pipol_statuses' => RefPipolStatus::all(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function edit(Project $project)
    {
        $project->load('bases','regions','pdp_chapters','pdp_indicators','ten_point_agendas','funding_sources','region_investments.region','fs_investments.funding_source','region_infrastructures.region','fs_infrastructures.funding_source','allocation','disbursement','nep','feasibility_study','project_update');

        $yes = new \stdClass();
        $yes->id = 1;
        $yes->name = 'Yes';
        $no = new \stdClass();
        $no->id = 0;
        $no->name = 'No';
        $boolean = array($yes, $no);

        // create infrastructure investments if they are not present in the model
        if (! count($project->region_infrastructures)) {
            $regions = RefRegion::all();
            $regionInvestments = collect($regions)->map(function ($r) {
                return [
                    'ref_region_id' => $r->id,
                ];
            });

            $project->region_infrastructures()->createMany($regionInvestments);
        }

        if (! count($project->fs_infrastructures)) {
            $fundingSources = RefFundingSource::all();
            $fsInvestments = collect($fundingSources)->map(function ($fs) {
                return [
                    'ref_funding_source_id' => $fs->id,
                ];
            });

            $project->fs_infrastructures()->createMany($fsInvestments);
        }

        return view('projects.edit', compact('project'))
            ->with([
                'offices'                   => Office::all(),
                'pap_types'                 => RefPapType::all(),
                'bases'                     => RefBasis::all(),
                'project_statuses'          => RefProjectStatus::all(),
                'spatial_coverages'         => RefSpatialCoverage::all(),
                'regions'                   => RefRegion::all()->sortBy('order'),
                'gads'                      => RefGad::all(),
                'pip_typologies'            => RefPipTypology::all(),
                'cip_types'                 => RefCipType::all(),
                'years'                     => RefYear::all(),
                'approval_levels'           => RefApprovalLevel::all(),
                'infrastructure_sectors'    => RefInfrastructureSector::with('children')->get(),
                'pdp_chapters'              => RefPdpChapter::orderBy('name')->get(),
                'sdgs'                      => RefSdg::all(),
                'ten_point_agendas'         => RefTenPointAgenda::all(),
                'pdp_indicators'            => RefPdpIndicator::with('children.children.children')
                    ->where('level',1)
                    ->select('id','name')->get(),
                'funding_sources'           => RefFundingSource::all(),
                'funding_institutions'      => RefFundingInstitution::all(),
                'implementation_modes'      => RefImplementationMode::all(),
                'tiers'                     => RefTier::all(),
                'preparation_documents'     => RefPreparationDocument::all(),
                'fs_statuses'               => RefFsStatus::all(),
                'ou_types'                  => RefOperatingUnitType::with('operating_units')->get(),
                'covid_interventions'       => RefCovidIntervention::all(),
                'boolean'                   => $boolean,
                'operating_units'           => RefOperatingUnit::all(),
                'prerequisites'             => RefPrerequisite::all(),
                'readiness_levels'          => RefReadinessLevel::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
//        dispatch_sync(new ProjectUpdateJob($request->validated(), $project->id));
        dispatch(new ProjectUpdateJob($request->validated(), $project->id));

        session()->flash('status', 'success|Successfully updated PAP.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Project $project, Request $request)
    {
        $projectArray = $project->toArray();
        $creator = $project->creator;

        if (config('ipms.force_delete')) {
            $project->forceDelete();
        } else {
            $project->delete();
        }

        if ($creator) {
            $creator->notify(new ProjectDeletedNotification($projectArray, auth()->user(), $request->reason));
        }

        return redirect()->route('projects.own');
    }

    public function assigned(Request $request)
    {
        abort_if(! auth()->user()->can('projects.view_assigned'), 403);

        return view('projects.assigned');
    }

    public function deleted(Request $request)
    {
        abort_if(! auth()->user()->can('projects.manage'), 403);

        return view('projects.deleted');
    }

    public function restore(string $uuid)
    {
        $project = Project::withTrashed()->where('uuid', $uuid)->firstOrFail();

        $project->restore();

        return redirect()->route('projects.deleted');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->search;

        $searchResults = (new Search())
            ->registerModel(Project::class, 'title')
            ->search($searchTerm);

        if ($request->ajax()) {
            return response()->json($searchResults);
        }

        return $searchResults;
    }

    public function generatePdf(Project $project)
    {
//        $project->load('creator','bases','regions','pdp_chapters','pdp_indicators','ten_point_agendas','funding_sources','region_investments.region','fs_investments.funding_source','allocation','disbursement','nep','feasibility_study');
//        $pdf = SnappyPdf::loadView('projects.pdf', compact('project'));
//
//        return $pdf->download(str_replace('-',' ',Str::slug($project->title)).'.pdf');

        $project->load('creator','bases','regions','pdp_chapters','pdp_indicators','ten_point_agendas','funding_sources','region_investments.region','fs_investments.funding_source','allocation','disbursement','nep','feasibility_study');
////         generate PDF
        return view('projects.pdf', compact('project'));
    }

    public function exportJson(Project $project)
    {
        $json = json_encode($project->load('creator','bases','regions','pdp_chapters','pdp_indicators','ten_point_agendas','funding_sources','region_investments.region','fs_investments.funding_source','allocation','disbursement','nep','feasibility_study','review'), JSON_PRETTY_PRINT);

        $file = Str::slug($project->title) . '.json';

        $destinationPath = \File::put(public_path($file), json_encode($json));

        return Storage::download(public_path($file));
    }

    public function drop(ProjectDropRequest $request, Project $project)
    {
        $project->reason_id             = $request->reason_id;
        $project->other_reason          = $request->other_reason;
        $project->submission_status_id  = RefSubmissionStatus::findByName(RefSubmissionStatus::DROPPED)->id;
        $project->save();

        return redirect()->route('projects.own');
    }
}
