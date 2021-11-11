<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectValidatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProjectUndoValidateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        $this->authorize('validate', $project);

        $project->undoValidate();

        $officeId = $project->office_id;

        $users = User::where('office_id', $officeId)->get();

        Notification::send($users, new ProjectValidatedNotification($project->id, auth()->id()));

        session()->flash('status','success|Successfully updated validation status');

        return back();
    }
}
