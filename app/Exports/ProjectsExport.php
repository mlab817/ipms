<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProjectsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Project::query();
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->pipol_code,
            $row->title,
            $row->office->acronym ?? '',
            $row->pap_type->name ?? '',
            $row->project_status->name ?? '',
            $row->spatial_coverage->name ?? '',
            $row->target_start_year,
            $row->target_end_year,
            $row->pdp_chapter->name ?? '',
            $row->funding_source->name ?? '',
            $row->implementation_mode->name ?? '',
            $row->tier->name ?? '',
            $row->total_project_cost,
            $row->submission_status->name ?? '',
            $row->updated_at->format('Y-m-d h:i:s'),
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'PIPOL Code',
            'Title',
            'Office',
            'Program or Project',
            'Overall Status',
            'Spatial Coverage',
            'Implementation Start',
            'Implementation End',
            'Main PDP Chapter',
            'Main Funding Source',
            'Mode of Implementation',
            'Category',
            'Total Project Cost (PhP)',
            'Submission Status',
            'As of '
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return mixed
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
