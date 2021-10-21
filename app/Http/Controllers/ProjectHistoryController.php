<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectHistoryController extends Controller
{
    public function __invoke(Project $project)
    {
        $tab = 'history';

        return view('projects.history', compact('project','tab'));
    }
}
