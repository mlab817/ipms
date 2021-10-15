<?php

namespace App\Http\Controllers;

use App\DataTables\AssignedProjectsDataTable;
use App\DataTables\ProjectsDataTable;
use App\DataTables\Scopes\AssignedProjectsDataTableScope;
use App\DataTables\Scopes\OfficeProjectsDataTableScope;
use App\DataTables\Scopes\OwnProjectsDataTableScope;
use App\DataTables\Scopes\ProjectsDataTableScope;
use App\Events\ProjectCreatedEvent;
use App\Events\ProjectReviewedEvent;
use App\Http\Requests\ProjectDropRequest;
use App\Http\Requests\ProjectEndorseRequest;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\UploadAttachmentRequest;
use App\Http\Resources\ProjectResource;
use App\Models\RefApprovalLevel;
use App\Models\RefBasis;
use App\Models\RefCipType;
use App\Models\RefCovidIntervention;
use App\Models\ProjectFsInvestment;
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
use App\Models\RefPipTypology;
use App\Models\RefPreparationDocument;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\RefReadinessLevel;
use App\Models\RefRegion;
use App\Models\ProjectRegionInvestment;
use App\Models\ProjectReview;
use App\Models\RefSdg;
use App\Models\RefSpatialCoverage;
use App\Models\RefSubmissionStatus;
use App\Models\RefTenPointAgenda;
use App\Models\RefTier;
use App\Models\User;
use App\Notifications\ProjectDeletedNotification;
use Barryvdh\Snappy\Facades\SnappyPdf;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Knp\Snappy\Pdf;
use RealRashid\SweetAlert\Facades\Alert;
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

        $projects = $this->filter($projectQuery, $request);

        return view('projects.index', compact('projects'))
            ->with([
                'pageTitle' => 'Projects'
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
    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());
        $project->creator()->associate(Auth::user());
        $project->save();

        event(new ProjectCreatedEvent($project));

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

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function edit(Project $project)
    {
        $project->load('bases','regions','pdp_chapters','pdp_indicators','ten_point_agendas','funding_sources','region_investments.region','fs_investments.funding_source','allocation','disbursement','nep','feasibility_study');

        return view('projects.edit', compact('project'))
            ->with('pageTitle', 'Edit Project')
            ->with([
                'offices'                   => Office::all(),
                'pap_types'                 => RefPapType::all(),
                'bases'                     => RefBasis::all(),
                'project_statuses'          => ProjectStatus::all(),
                'spatial_coverages'         => RefSpatialCoverage::all(),
                'regions'                   => RefRegion::all(),
                'gads'                      => RefGad::all(),
                'pip_typologies'            => RefPipTypology::all(),
                'cip_types'                 => RefCipType::all(),
                'years'                     => config('ipms.editor.years'),
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
                'covidInterventions'        => RefCovidIntervention::all(),
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
        $project->update($request->validated());

        $project->bases()->sync($request->bases);
        $project->regions()->sync($request->regions);
        $project->funding_sources()->sync($request->funding_sources);
        $project->sdgs()->sync($request->sdgs);
        $project->pdp_chapters()->sync($request->pdp_chapters);
        $project->pdp_indicators()->sync($request->pdp_indicators);
        $project->ten_point_agendas()->sync($request->ten_point_agendas);
        $project->operating_units()->sync($request->operating_units);
        $project->covid_interventions()->sync($request->covid_interventions);

        foreach ($request->fs_investments as $fs_investment) {
            $fsToEdit = ProjectFsInvestment::where('project_id', $project->id)->where('fs_id', $fs_investment['fs_id'])->first();
            $fsToEdit->update($fs_investment);
//            update(['id' => $fs_investment['id']], $fs_investment);
        }
//
        foreach ($request->region_investments as $region_investment) {
            $itemToEdit = ProjectRegionInvestment::where('project_id', $project->id)->where('region_id', $region_investment['region_id'])->first();
            $itemToEdit->update($region_investment);
        }

        $project->project_update()->update([
            'updates'   => $request->updates,
            'updates_date' => $request->updates_date,
        ]);
        $project->expected_output()->update([
            'expected_outputs' => $request->expected_outputs
        ]);
        $project->description()->update([
            'description' => $request->description,
        ]);
        $project->feasibility_study()->update($request->feasibility_study);
        $project->nep()->update($request->nep);
        $project->allocation()->update($request->allocation);
        $project->disbursement()->update($request->disbursement);

        if ($request->has('draft')) {
            $project->submission_status_id = RefSubmissionStatus::findByName('Draft')->id;
            $project->save();
            Alert::success('Success', 'Successfully saved as draft');
        }

        if ($request->has('endorse')) {
            $this->authorize('endorse', $project);
            $project->submission_status_id = RefSubmissionStatus::findByName('Endorsed')->id;
            $project->save();
            Alert::success('Success', 'Successfully saved as endorsed');
        }

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

        Alert::success('Success', 'Successfully deleted project');

        return redirect()->route('projects.own');
    }

    public function filter($projectQuery, $request)
    {
        $projects = collect();

        if ($request->has('search')) {
            $query = $request->query();
            $searchTerm = '%' .  $query['search'] . '%' ?? '';
            $orderBy = $query['orderBy']  ?? 'id';
            $sortOrder = $query['sortOrder'] ?? 'ASC';

            if (! $searchTerm) {
                $projects = $projectQuery
                    ->orderBy($orderBy, $sortOrder)
                    ->paginate();
            } else {
                $projects = $projectQuery
                    ->where('title','like', $searchTerm)
//                    ->orWhereHas('project_status', function ($query) use ($searchTerm) {
//                        $query->where('name', 'like', $searchTerm);
//                    })
//                    ->orWhereHas('office', function ($query) use ($searchTerm) {
//                        $query->where('name','like', $searchTerm)
//                            ->orWhere('acronym','like', $searchTerm);
//                    })
//                    ->orWhereHas('creator', function ($query) use ($searchTerm) {
//                        $query->where('first_name','like', $searchTerm);
//                    })
                    ->orderBy($orderBy, $sortOrder)
                    ->paginate();
            }
        } else {
            $projects = $projectQuery->paginate();
        }

        return $projects;
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

        Alert::success('Success','Project successfully restored');

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

        Alert::success('Success','Project successfully dropped');

        return redirect()->route('projects.own');
    }
}
