<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectValidatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ProjectInvalidateController extends Controller
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

        $validator = Validator::make($request->all(),
            ['validation_remarks' => 'required|min:10']
        );

        if ($validator->fails()) {
            return back()->with('status','error|' . $validator->errors()->first('validation_remarks'));
        }

        $project->invalidate($request->validation_remarks);

        $users = $project->office->reviewers;

        Notification::send($users, new ProjectValidatedNotification($project->id, auth()->id()));

        session()->flash('status','success|Successfully updated validation status');

        return back();
    }
}
