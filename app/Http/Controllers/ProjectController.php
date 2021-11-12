<?php

namespace App\Http\Controllers;

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
use App\Models\User;
use App\Notifications\ProjectCreatedNotification;
use App\Notifications\ProjectDeletedNotification;
use App\Services\ProjectCheckForIssuesService;
use App\Services\ProjectCreateService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
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
        $project = new Project;

        $project = $project->byRole();

        // set default tab to trip
        $tab = $request->tab ?? 'trip';

        $q = $request->q;
        $validated = $request->validated;
        $pipsStatus = RefSubmissionStatus::findByName($request->status ?? '');
        $pipolStatus = RefPipolStatus::findByName($request->pipol);

        if ($tab == 'trip') {
            $project = $project->trip();
        }

        if ($tab == 'pip') {
            $project = $project->pip();
        }

        if ($tab == 'untagged') {
            $project = $project->untagged();
        }

        if ($tab == 'dropped') {
            $project = $project->dropped();
        }

        if ($pipsStatus) {
            $project = $project->where('ref_submission_status_id', $pipsStatus->id);
        }

        if ($validated) {
            $project = $project->whereNotNull('validated_at');
        }

        if ($pipolStatus) {
            $project = $project->where('ref_pipol_status_id', $pipolStatus->id);
        }

        if ($q) {
            $project = Project::search($q)->constrain($project);
        }

        $project->orderBy('updated_at','desc');

        $projects = $project->paginate();

        $projects->load(['creator.office','office','pipol_status','submission_status','description','pap_type','project_status','seen_by']);

        return view('projects.index', compact('projects','tab'))
            ->with([
                'submission_statuses'=> RefSubmissionStatus::withCount(['projects' => function($query) {
                    $query->byRole();
                }])->get(),
                'pipol_statuses'     => RefPipolStatus::withCount(['projects' => function($query) {
                    $query->byRole();
                }])->get(),
                'validatedProjects'     => Project::byRole()->whereNotNull('validated_at')->count(),
                'invalidatedProjects'   => Project::byRole()->whereNull('validated_at')->count(),
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
        try {
            $project = $service->execute($request->validated(), auth()->id());

            $checkForIssuesService->execute($project->toArray(), $project->id, $project->updated_at);

            // notify concerned
            $office = Office::find($project->office_id);

            // notify users
            $otherUsersFromSameOffice = User::where('office_id', $office->id)
                ->where('id', '<>', auth()->id())->get();
            $reviewers = $office->reviewers;
            $users = collect($otherUsersFromSameOffice, $reviewers);

            Notification::send($users, new ProjectCreatedNotification($project->id));
        } catch (\Exception $e) {
            session()->flash('status','error|'. $e->getMessage());
        }


        return redirect()->route('projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function show(Project $project, Request $request)
    {
        if (! $project->seen) {
            $project->seen_by()->attach(auth()->id());
        }

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

        if ($request->has('print')) {
            return view('projects.print', compact('project'))
                ->with([
                    'submission_statuses' => RefSubmissionStatus::all(),
                    'pipol_statuses' => RefPipolStatus::all(),
                ]);
        }

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
                'pdp_indicators'            => [],
//                'pdp_indicators'            => RefPdpIndicator::with('children.children.children')
//                    ->where('level',1)
//                    ->select('id','name')->get(),
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

        $office = Office::find($project->office_id);

        // notify users from same office
        $otherUsersFromSameOffice = User::where('office_id', $office->id)
            ->where('id', '<>', auth()->id())->get();

        Notification::send($otherUsersFromSameOffice, new ProjectCreatedNotification($project->id));

        session()->flash('status', 'success|Successfully updated PAP.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Project $project)
    {
        if (config('ipms.force_delete')) {
            $project->forceDelete();
        } else {
            $project->delete();
        }

        session()->flash('status','success|Successfully deleted project.');

        return redirect()->route('projects.index');
    }

    public function restore(string $uuid)
    {
        $project = Project::withTrashed()->where('uuid', $uuid)->firstOrFail();

        $project->restore();

        return redirect()->route('projects.deleted');
    }
}
