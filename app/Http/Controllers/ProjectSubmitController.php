<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\RefSubmissionStatus;
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
        $submissionStatus = RefSubmissionStatus::find($request->ref_submission_status_id);

        $project->ref_submission_status_id = $submissionStatus->id;
        $project->saveQuietly(); // save quietly to skip audit logs creation

        $project->audit_logs()->create([
            'description'  => strtolower($submissionStatus->name),
//            'subject_id'   => $model->id ?? null,
//            'subject_type' => get_class($model) ?? null,
            'user_id'      => auth()->id(),
//            'properties'   => json_encode([
//                'original' => $model->getOriginal() ?? null,
//                'modified' => $model->getChanges() ?? null
//            ]),
            'original'     => null,
            'modified'     => null,
            'host'         => request()->ip() ?? null,
        ]);

        // TODO: Notify IPD
        session()->flash('status', 'success|Successfully submitted PAP');

        return back();
    }
}
