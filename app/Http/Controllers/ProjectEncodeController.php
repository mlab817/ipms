<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\RefPipolStatus;
use Illuminate\Http\Request;

class ProjectEncodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        $pipolStatus = RefPipolStatus::find($request->ref_pipol_status_id);

        // update pipol code
        // update pipol status
        $project->pipol_code            = $request->pipol_code;
        $project->ref_pipol_status_id   = $request->ref_pipol_status_id;
        $project->saveQuietly();

        $project->audit_logs()->create([
            'description' => strtolower($pipolStatus->name) . ' in PIPOL System',
            'user_id' => auth()->id()
        ]);

        session()->flash('status','success|Successfully ' . $pipolStatus->name .' this PAP to PIPOL System');

        return back();
    }
}
