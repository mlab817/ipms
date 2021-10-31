<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectTransferredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProjectTransferController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        // change creator_id or office_id
        $user = User::findByUsername($request->username);

        if (! $user) {
            session()->flash('status','error|Please select a valid user.');

            return back();
        }

        $officeId = $project->office_id;

        $project->transfer($user);

        $users = User::where('office_id', $officeId)->get();

        $usersToNotify = collect($users, $user);

        Notification::send($usersToNotify, new ProjectTransferredNotification($project->id, auth()->id(), $user->id));

        session()->flash('status','success|Successfully transferred PAP');

        return back();
    }
}
