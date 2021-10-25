<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\RefOperatingUnit;
use App\Models\RefOperatingUnitType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Office::class, 'office');
    }

    public function index(Request $request)
    {
        // add scopes for
        $user = auth()->user();
        $offices = Office::query();

        if (!$user->isAdmin()) {
            if ($user->isIpd()) {
                $filters = $user->offices->pluck('id')->toArray() + [$user->office_id] ?? [];
                $offices->whereIn('id', $filters);
            }

            if ($user->isEncoder()) {
                $offices->where('id', $user->office_id);
            }
        }

        $ou_types = RefOperatingUnitType::withCount('offices')->get();

        if ($request->q) {
            $offices->where('name', 'like', '%' . $request->q . '%')
                ->orWhere('acronym', 'like', '%' . $request->q . '%');
        }

        if ($request->ou_type) {
            $type = RefOperatingUnitType::where('name', $request->ou_type)->first();
            $ous = RefOperatingUnit::where('ref_operating_unit_type_id', $type->id)->pluck('id')->toArray();
            $offices->whereIn('ref_operating_unit_id', $ous);
        }

        $offices = $offices->with('projects')->paginate(10);

        return view('offices.index', compact('offices', 'ou_types'));
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

    public function show(Office $office)
    {
        $office->load('projects');

        return view('offices.show', compact('office'));
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