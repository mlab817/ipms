<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectSubmitController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        $status = $request->ref_submission_status_id;

        $project->ref_submission_status_id = $status;
        $project->save();

        // TODO: Notify IPD

        return back()->with('success', 'Successfully submitted PAP');
    }
}
