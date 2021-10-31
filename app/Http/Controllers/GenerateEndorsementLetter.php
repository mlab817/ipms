<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFsInfrastructure;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;

class GenerateEndorsementLetter extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $office = auth()->user()->office;
        $projects = Project::where('office_id', $office->id)->get();

        $totalCost = $projects->sum('total_project_cost');
        $ids = $projects->pluck('id')->toArray();
        $fsInfrastructures = ProjectFsInfrastructure::whereIn('project_id', $ids)->get();
        // $cost2023

        $doc = new PhpWord();

        $doc->setDefaultFontSize(12);
        $doc->setDefaultFontName('cambria');
        $doc->setDefaultParagraphStyle([
            'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),
            'spacing' => 150,
            'lineHeight' => 1,
        ]);

        $section = $doc->addSection([
            'paperSize' => 'A4',
            'marginTop' => Converter::inchToTwip(2),
            'marginBottom' => Converter::inchToTwip(1.5),
        ]);

        $header = $section->addHeader();
        $header->addWatermark(public_path('images/letterhead.png'), [
            'width' => 596,
            'marginTop' => -36,
            'marginLeft' => -75,
            'posHorizontal' => 'absolute',
            'posVertical' => 'absolute',
        ]);

        // date right aligned
        $section->addTextRun()->addText(date('F d, Y'));

        $section->addTextRun();

        $section->addTextRun()->addText('SECRETARY WILLIAM D. DAR', ['bold' => true]);
        $section->addTextRun()->addText('Department of Agriculture');
        $section->addTextRun()->addText('Elliptical Road, Diliman, Quezon City');

        // addressess
        // name
        // office
        // address
        // address 2

        $section->addTextRun();

        // Dear addressee
        $textrun = $section->addTextRun();
        $textrun->addText('Dear ');
        $textrun->addText('Secretary Dar: ', ['bold' => true]);

        $section->addTextRun();

        $textrun = $section->addTextRun();
        $textrun->addText("This is to endorse, for inclusion in the 2023-2025 Three-Year Rolling Infrastructure Program (TRIP) the following priority programs and projects of the {$office->acronym} as encoded in the Public Investment Program System:");
        $textrun->addFootnote()->addText('Note: FY 2023 cost were derived from total cost for FY 2023 based on inputs in the funding source breakdown.', ['size' => 10]);

        $section->addTextRun();

        $table = $section->addTable([
            'borderColor' => '000000',
            'borderSize' => 1,
            'tblHeader' => true,
        ]);

        $table->addRow();
        $table->addCell(1750)->addText('PAP Title');
        $table->addCell(1750)->addText('PAP Type');
        $table->addCell(1750)->addText('Spatial Coverage');
        $table->addCell(1750)->addText('FY 2023');
        $table->addCell(1750)->addText('Total Project Cost');

        $table->addCell(1750)->addText('Status');

        foreach ($projects as $project) {
            $table->addRow();
            $table->addCell(1750)->addText($project->title);
            $table->addCell(1750)->addText($project->pap_type->name);
            $table->addCell(1750)->addText($project->spatial_coverage->name);
            $table->addCell(1750)->addText('');
            $table->addCell(1750)->addText(number_format($project->total_project_cost, 2), [], ['align' => 'right']);
            $table->addCell(1750)->addText($project->project_status->name);
        }

        $table->addRow();
        $table->addCell(1750)->addText('Total');
        $table->addCell(1750)->addText('');
        $table->addCell(1750)->addText('');
        $table->addCell(1750)->addText(number_format($fsInfrastructures->sum('y2023'), 2), [], ['align' => 'right']);
        $table->addCell(1750)->addText(number_format($totalCost, 2), [], ['align' => 'right']);
        $table->addCell(1750)->addText('');

        $section->addTextRun();

        $section->addTextRun()->addText('Warm regards,');

        $section->addTextRun();

        $section->addTextRun()->addText('Very truly yours, ');

        $section->addTextRun();
        $section->addTextRun();

        $section->addTextRun()->addText($office->office_head_name);
        $section->addTextRun()->addText($office->name);

        $objWriter = IOFactory::createWriter($doc, 'Word2007');


        $doc_name = time() . '_' . strtolower($office->acronym) . '_endorsement.docx';
        $objWriter->save($doc_name); // saving in the public path just for testing

        return response()->download(public_path($doc_name))->deleteFileAfterSend(true);

//        $data = Project::all();
//
//        // share data to view
//        view()->share('employee',$data);
//
//        $pdf = PDF::loadView('endorsement.preview', $data);
//
//        // download PDF file with download method
//        return $pdf->download('pdf_file.pdf');
    }
}
