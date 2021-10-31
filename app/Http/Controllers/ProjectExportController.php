<?php

namespace App\Http\Controllers;

use App\Exports\ProjectsExport;
use Illuminate\Http\Request;

class ProjectExportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return (new ProjectsExport())->download(now() . '_projects.xlsx');
    }
}
