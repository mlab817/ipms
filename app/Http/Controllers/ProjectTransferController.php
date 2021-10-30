<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

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

        $project->transfer($user);

        session()->flash('status','success|Successfully transferred PAP');

        return back();
    }
}
