<?php

namespace App\Http\Controllers\API;

use App\Exports\ProjectsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download()
    {
    	return Excel::download(new ProjectsExport, 'projects.xlsx');
    }
}
