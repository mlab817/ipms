<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use PDF;

class GenerateEndorsementLetter extends Controller
{
    public function preview()
    {
        $projects = Project::all();

        return view('endorsement.preview', compact('projects'));
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $data = Project::all();

        // share data to view
        view()->share('employee',$data);
        $pdf = PDF::loadView('endorsement.preview', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
