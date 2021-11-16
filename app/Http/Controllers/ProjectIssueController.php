<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectIssueController extends Controller
{
    public function __invoke(Project $project)
    {
        $tab = 'issues';
        $issues = $project->issue->issues ?? [];

        return view('projects.issues', compact('project','tab', 'issues'));
    }
}
