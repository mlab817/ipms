<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AppraisalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $project = new Project;

        $tab = $request->tab ?? '';

        $project = $project->byRole();

        if ($tab) {
            $project = $project->validationStatus($tab);
        } else {
            $project = $project->notValidated();
        }

        if ($request->q) {
            $project = Project::search($request->q)->constrain($project);
        }

        $project = $project->orderBy('updated_at', 'desc');

        $projects = $project->paginate();

        return view('appraisal', compact('projects','tab'));
    }
}
