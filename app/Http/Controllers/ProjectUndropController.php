<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectUndropController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        $this->authorize('undrop', $project);

        $project->undrop();

        session()->flash('status','success|Successfully undid drop of PAP');

        return redirect()->route('projects.show', $project);
    }
}
