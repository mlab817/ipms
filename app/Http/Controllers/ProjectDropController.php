<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectDroppedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProjectDropController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        $this->authorize('drop', $project);

        $project->drop($request->reason_for_dropping);

        // notify concerned
        $office = Office::find($project->office_id);

        // notify users
        $otherUsersFromSameOffice = User::where('office_id', $office->id)
            ->where('id', '<>', auth()->id())->get();
        $reviewers = $office->reviewers;
        $users = collect([$otherUsersFromSameOffice, $reviewers]);

        Notification::send($users, new ProjectDroppedNotification($project->id, auth()->id()));

        session()->flash('status','success|Successfully dropped PAP.');

        return back();
    }
}
