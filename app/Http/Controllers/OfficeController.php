<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Project;
use App\Models\RefOperatingUnit;
use App\Models\RefOperatingUnitType;
use App\Models\RefPipolStatus;
use App\Models\RefSubmissionStatus;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Office::class, 'office');
    }

    public function index(Request $request)
    {
        $office = new Office;

        $office = $office->byRole();

        $ou_types = RefOperatingUnitType::withCount(['offices' => function($query) {
            $query->byRole();
        }])->get();

        if ($request->q) {
            $office = Office::search($request->q)->constrain($office);
        }

        if ($request->ou_type) {
            $type = RefOperatingUnitType::where('name', $request->ou_type)->first();
            $ous = RefOperatingUnit::where('ref_operating_unit_type_id', $type->id)->pluck('id')->toArray();
            $office->whereIn('ref_operating_unit_id', $ous);
        }

        $offices = $office->paginate(10);

        $offices->load('projects');

        return Inertia::render('Offices', compact('offices', 'ou_types'));
    }

    public function create()
    {
        $operating_units = RefOperatingUnit::all();

        return view('offices.create', compact('operating_units'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:offices,name',
            'ref_operating_unit_id' => 'required|exists:ref_operating_units,id',
            'acronym' => 'required',
            'email' => 'required|email',
            'contact_numbers' => 'required',
            'office_head_name' => 'required',
            'office_head_position' => 'required',
        ]);

        Office::create($validated);

        session()->flash('status', 'success|Successfully created office');

        return redirect()->route('offices.index');
    }

    public function show(Request $request, Office $office)
    {
        $project = new Project;

        $project = $project->byRole();

        $project = $project->where('office_id', $office->id);

        $q = $request->q;
        $pipsStatus = RefSubmissionStatus::findByName($request->status ?? '');
        $pipolStatus = RefPipolStatus::findByName($request->pipol);

        if ($pipsStatus) {
            $project = $project->where('ref_submission_status_id', $pipsStatus->id);
        }

        if ($request->has('validated')) {
            if ($request->validated == 1) {
                $project = $project->whereNotNull('validated_at');
            } else if ($request->validated == 0) {
                $project = $project->whereNull('validated_at');
            }

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

        return view('offices.show', compact('office','projects'))
            ->with([
                'submission_statuses' => RefSubmissionStatus::all(),
                'pipol_statuses' => RefPipolStatus::all(),
            ]);
    }

    public function edit(Office $office)
    {
        $operating_units = RefOperatingUnit::all();
        $reviewers = User::where('role_id', Role::findByName('ipd')->id)->get();

        return view('offices.edit', compact('office','operating_units','reviewers'));
    }

    public function update(Request $request, Office $office)
    {
        $validated = $request->validate([
            'name' => 'required|unique:offices,name, ' . $office->id,
            'ref_operating_unit_id' => 'required|exists:ref_operating_units,id',
            'acronym' => 'required',
            'email' => 'required|email',
            'contact_numbers' => 'required',
            'office_head_name' => 'required',
            'office_head_position' => 'required',
            'reviewers' => 'required',
            'reviewers.*' => 'exists:users,id',
        ]);

        $office->update($validated);
        $office->reviewers()->sync($request->reviewers);

        session()->flash('status', 'success|Successfully updated office');

        return back();
    }

    public function destroy(Office $office)
    {
        $office->delete();

        session()->flash('status', 'success|Successfully deleted office');

        return back();
    }
}