<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectValidatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProjectValidateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Project $project
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Request $request, Project $project)
    {
        $this->authorize('validate', $project);

        $request->validate([
            'ref_validation_status_id'  => 'required|exists:ref_validation_statuses,id',
            'validation_remarks'        => 'required',
            'no_further_inputs'         => 'sometimes|bool',
        ]);

        $project->validate(
            $request->ref_validation_status_id,
            $request->validation_remarks,
            $request->no_further_inputs,
        );

        $officeId = $project->office_id;

        $users = User::where('office_id', $officeId)->get();

        Notification::send($users, new ProjectValidatedNotification($project->id, auth()->id()));

        session()->flash('status','success|Successfully updated validation status');

        return back();
    }
}
