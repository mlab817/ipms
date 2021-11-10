<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectCreatedNotification;
use App\Notifications\ProjectEndorsedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProjectEndorseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        $this->authorize('endorse', $project);

        $project->endorse();

        // notify concerned
        $office = Office::find($project->office_id);

        // notify users
        $otherUsersFromSameOffice = User::where('office_id', $office->id)
            ->where('id', '<>', auth()->id())->get();
        $reviewers = $office->reviewers;
//        $users = $otherUsersFromSameOffice->merge($reviewers);

        if (count($otherUsersFromSameOffice)) {
            Notification::send($otherUsersFromSameOffice, new ProjectEndorsedNotification($project->id, auth()->id()));
        }

        if (count($reviewers)) {
            Notification::send($reviewers, new ProjectEndorsedNotification($project->id, auth()->id()));
        }

        session()->flash('status','success|Successfully endorsed PAP.');

        return back();
    }
}
