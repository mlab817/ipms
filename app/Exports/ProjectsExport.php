<?php

namespace App\Exports;

use Log;
use App\Models\Project;
use App\Scopes\ProjectScope;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProjectsExport implements FromCollection, WithMapping, WithHeadings, WithColumnFormatting
{
	use Exportable;

	private $filename = 'projects.xlsx';

	private $writerType = Excel::XLSX;

	private $headers = [
		'Content-Type' => 'text/csv'
	];

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function collection()
	{
		return Project::withoutGlobalScope(ProjectScope::class)->get();
	}

	public function map($project): array
	{
		return [
			$project->id,
			$project->operating_unit->name ?? '',
			$project->prexc_program->name ?? '',
			$project->prexc_subprogram->name ?? '',
			$project->banner_program->name ?? '',
			$project->title,
			$project->uacs_code,
			$project->infrastructure_target_2016,
			$project->infrastructure_target_2017,
			$project->infrastructure_target_2018,
			$project->infrastructure_target_2019,
			$project->infrastructure_target_2020,
			$project->infrastructure_target_2021,
			$project->infrastructure_target_2022,
			$project->infrastructure_target_2023,
			$project->infrastructure_target_2024,
			$project->infrastructure_target_2025,
//            '=SUM(F2:O2)',
			$project->infrastructure_target_total,
			$project->investment_target_2016,
			$project->investment_target_2017,
			$project->investment_target_2018,
			$project->investment_target_2019,
			$project->investment_target_2020,
			$project->investment_target_2021,
			$project->investment_target_2022,
			$project->investment_target_2023,
			$project->investment_target_2024,
			$project->investment_target_2025,
//            '=SUM(Q2:Z2)',
			$project->investment_target_total,
			$project->nep_2016,
			$project->nep_2017,
			$project->nep_2018,
			$project->nep_2019,
			$project->nep_2020,
			$project->nep_2021,
			$project->nep_2022,
			$project->nep_2023,
			$project->nep_2024,
			$project->nep_2025,
			$project->nep_total,
			// '=SUM(AA2:AK2)',
			$project->gaa_2016,
			$project->gaa_2017,
			$project->gaa_2018,
			$project->gaa_2019,
			$project->gaa_2020,
			$project->gaa_2021,
			$project->gaa_2022,
			$project->gaa_2023,
			$project->gaa_2024,
			$project->gaa_2025,
			$project->gaa_total,
			// '=SUM(AM2:AV2)',
			$project->disbursement_2016,
			$project->disbursement_2017,
			$project->disbursement_2018,
			$project->disbursement_2019,
			$project->disbursement_2020,
			$project->disbursement_2021,
			$project->disbursement_2022,
			$project->disbursement_2023,
			$project->disbursement_2024,
			$project->disbursement_2025,
			$project->disbursement_total,
//            '=SUM(AY2:BG2)',
		];
	}

	public function columnFormats(): array
	{
		return [
			'G' => NumberFormat::FORMAT_TEXT,
			'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'K' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'L' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'M' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'O' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'P' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'Q' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'R' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'S' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'T' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'U' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'V' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'W' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'X' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'Y' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'Z' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AA' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AB' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AC' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AD' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AE' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AF' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AG' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AH' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AI' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AJ' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AK' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AL' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AM' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AN' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AO' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AP' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AQ' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AR' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AS' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AT' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AU' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AV' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AW' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AX' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AY' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'AZ' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BA' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BB' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BC' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BD' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BE' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BF' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BG' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BH' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BI' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'BJ' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
		];
	}

	public function styles(Worksheet $sheet)
	{
		return [
			1 => ['font' => ['bold' => true ]],
		];
	}

	public function headings(): array
	{
		return [
			'ID',
			'Operating Unit',
			'Program',
			'Subprogram',
			'Banner Program',
			'Title',
			'UACS Code',
			'Infrastructure Investments (PhP)_2016 & Prior',
			'Infrastructure Investments (PhP)_2017',
			'Infrastructure Investments (PhP)_2018',
			'Infrastructure Investments (PhP)_2019',
			'Infrastructure Investments (PhP)_2020',
			'Infrastructure Investments (PhP)_2021',
			'Infrastructure Investments (PhP)_2022',
			'Infrastructure Investments (PhP)_2023',
			'Infrastructure Investments (PhP)_2024',
			'Infrastructure Investments (PhP)_2025 & Beyond',
			'Infrastructure Investments (PhP)_Total',
			'Total Investments (PhP)_2016 & Prior',
			'Total Investments (PhP)_2017',
			'Total Investments (PhP)_2018',
			'Total Investments (PhP)_2019',
			'Total Investments (PhP)_2020',
			'Total Investments (PhP)_2021',
			'Total Investments (PhP)_2022',
			'Total Investments (PhP)_2023',
			'Total Investments (PhP)_2024',
			'Total Investments (PhP)_2025 & Beyond',
			'Total Investments (PhP)_Total',
			'National Expenditure Program (PhP)_2016 & Prior',
			'National Expenditure Program (PhP)_2017',
			'National Expenditure Program (PhP)_2018',
			'National Expenditure Program (PhP)_2019',
			'National Expenditure Program (PhP)_2020',
			'National Expenditure Program (PhP)_2021',
			'National Expenditure Program (PhP)_2022',
			'National Expenditure Program (PhP)_2023',
			'National Expenditure Program (PhP)_2024',
			'National Expenditure Program (PhP)_2025 & Beyond',
			'National Expenditure Program (PhP)_Total',
			'General Appropriations Act (PhP)_2016 & Prior',
			'General Appropriations Act (PhP)_2017',
			'General Appropriations Act (PhP)_2018',
			'General Appropriations Act (PhP)_2019',
			'General Appropriations Act (PhP)_2020',
			'General Appropriations Act (PhP)_2021',
			'General Appropriations Act (PhP)_2022',
			'General Appropriations Act (PhP)_2023',
			'General Appropriations Act (PhP)_2024',
			'General Appropriations Act (PhP)_2025 & Beyond',
			'General Appropriations Act (PhP)_Total',
			'Actual Disbursements (PhP)_2016 & Prior',
			'Actual Disbursements (PhP)_2017',
			'Actual Disbursements (PhP)_2018',
			'Actual Disbursements (PhP)_2019',
			'Actual Disbursements (PhP)_2020',
			'Actual Disbursements (PhP)_2021',
			'Actual Disbursements (PhP)_2022',
			'Actual Disbursements (PhP)_2023',
			'Actual Disbursements (PhP)_2024',
			'Actual Disbursements (PhP)_2025 & Beyond',
			'Actual Disbursements (PhP)_Total',
		];
	}
}
