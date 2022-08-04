<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackerController extends Controller
{
    public function index()
    {
        return Inertia::render('Tracker', [
            'projects' => Project::with(
                'description',
                'submission_status',
                'pipol_status',
                'office.operating_unit',
                'creator')->paginate(),
        ]);
    }
}
