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

        $project->trip = $request->trip;
        $project->pip = $request->pip;
        $project->save();

        $project->validate($request->validation_remarks);

        $officeId = $project->office_id;

        $users = User::where('office_id', $officeId)->get();

        Notification::send($users, new ProjectValidatedNotification($project->id, auth()->id()));

        session()->flash('status','success|Successfully updated validation status');

        return back();
    }
}
