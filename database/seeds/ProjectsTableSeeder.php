<?php

use App\User;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // clear projects table
        DB::table('projects')->truncate();

        $json = File::get('database/seeds/json/pip_final.json');
        $projects = json_decode($json);

        // Log::debug(json_encode($projects));

        function stringToArray($stringArray) {
          $array = array($stringArray);
          $intArray = array_map(
            function($value) { return (int) $value; },
            $array
          );

          return $intArray;
        }

        // iterate over projects and create
        if ($projects) {
          foreach ($projects as $p) {
              $project = Project::withoutEvents(function() use ($p) {
                  $project = Project::create([
                    'pipol_url' => $p->pipol_url,
                    'pipol_id' => intval($p->pipol_id),
                    'title' => $p->title,
                    'operating_unit_id' => intval($p->operating_unit_id),
                    'type_id' => intval($p->type_id),
                    'description' => $p->description,
                    'pipol_code' => $p->pipol_code,
                    'spatial_coverage_id' => intval($p->spatial_coverage_id),
                    'region_id' => intval($p->region_id),
                    'pip' => intval($p->pip),
                    'typology_id' => intval($p->typology_id),
                    'cip' => $p->cip,
                    'cip_type_id' => intval($p->cip_type_id),
                    'trip' => $p->trip,
                    'rdip' => $p->rdip,
                    'rdc_required' => $p->rdc_required,
                    'rdc_endorsed' => $p->rdc_endorsed,
                    'rdc_endorsed_date' => $p->rdc_endorsed_date == ''  ? null : Carbon::createFromFormat('d/m/Y',$p->rdc_endorsed_date),
                    'neda_secretariat_review_date' => $p->neda_secretariat_review_date  == '' ? null : Carbon::createFromFormat('d/m/Y',$p->neda_secretariat_review_date),
                    'neda_submission_date' => $p->neda_submission_date == '' ? null : Carbon::createFromFormat('d/m/Y',$p->neda_submission_date),
                    'icc_endorsed_date' => $p->icc_endorsed_date == '' ? null : Carbon::createFromFormat('d/m/Y',$p->icc_endorsed_date),
                    'icc_approved_date' => $p->icc_approved_date == ''? null : Carbon::createFromFormat('d/m/Y',$p->icc_approved_date),
                    'neda_board_date' => $p->neda_board_date == ''? null : Carbon::createFromFormat('d/m/Y',$p->neda_board_date),
                    'implementation_risk' => $p->implementation_risk,
                    'project_status_id' => intval($p->project_status_id),
                    'iccable' => $p->iccable,
                    'updates' => $p->updates,
                    'updates_date' => $p->updates_date == '' ? NULL : Carbon::createFromFormat('d/m/Y',$p->updates_date),
                    'pdp_chapter_id' => $p->pdp_chapter_id,
                    'expected_outputs' => $p->expected_outputs,
                    'gad_id' => intval($p->gad_id),
                    'target_start_year' => $p->target_start_year,
                    'target_end_year' => $p->target_end_year,
                    'technical_readiness_id' => $p->technical_readiness_id,
                    'fs_target_2018' => $p->fs_target_2018,
                    'fs_target_2019' => $p->fs_target_2019,
                    'fs_target_2020' => $p->fs_target_2020,
                    'fs_target_2021' => $p->fs_target_2021,
                    'fs_target_2022' => $p->fs_target_2022,
                    'fs_target_total' => $p->fs_target_total,
                    'has_row' => $p->has_row,
                    'has_rap' => $p->has_rap,
                    'has_row_rap' => $p->has_row_rap,
                    'row_affected' => $p->row_affected,
                    'rap_affected' => $p->rap_affected,
                    'row_target_2017' => $p->row_target_2017,
                    'row_target_2018' => $p->row_target_2018,
                    'row_target_2019' => $p->row_target_2019,
                    'row_target_2020' => $p->row_target_2020,
                    'row_target_2021' => $p->row_target_2021,
                    'row_target_2022' => $p->row_target_2022,
                    'row_target_total' => $p->row_target_total,
                    'rap_target_2017' => $p->rap_target_2017,
                    'rap_target_2018' => $p->rap_target_2018,
                    'rap_target_2019' => $p->rap_target_2019,
                    'rap_target_2020' => $p->rap_target_2020,
                    'rap_target_2021' => $p->rap_target_2021,
                    'rap_target_2022' => $p->rap_target_2022,
                    'rap_target_total' => $p->rap_target_total,
                    'employment_generated' => $p->employment_generated,
                    'implementation_mode_id' => $p->implementation_mode_id,
                    'nep_2017' => $p->nep_2017,
                    'gaa_2017' => $p->gaa_2017,
                    'disbursement_2016' => $p->disbursement_2016,
                    'nep_2018' => $p->nep_2018,
                    'gaa_2018' => $p->gaa_2018,
                    'disbursement_2017' => $p->disbursement_2017,
                    'nep_2019' => $p->nep_2019,
                    'gaa_2019' => $p->gaa_2019,
                    'disbursement_2018' => $p->disbursement_2018,
                    'nep_2020' => $p->nep_2020,
                    'gaa_2020' => $p->gaa_2020,
                    'disbursement_2019' => $p->disbursement_2019,
                    'nep_2021' => $p->nep_2021,
                    'gaa_2021' => $p->gaa_2021,
                    'disbursement_2020' => $p->disbursement_2020,
                    'nep_2022' => $p->nep_2022,
                    'gaa_2022' => $p->gaa_2022,
                    'disbursement_2021' => $p->disbursement_2021,
                    'investment_target_2016' => $p->investment_target_2016,
                    'investment_target_2017' => $p->investment_target_2017,
                    'investment_target_2018' => $p->investment_target_2018,
                    'investment_target_2019' => $p->investment_target_2019,
                    'investment_target_2020' => $p->investment_target_2020,
                    'investment_target_2021' => $p->investment_target_2021,
                    'investment_target_2022' => $p->investment_target_2022,
                    'investment_target_2023' => $p->investment_target_2023,
                    'infrastructure_target_2016' => $p->infrastructure_target_2016,
                    'infrastructure_target_2017' => $p->infrastructure_target_2017,
                    'infrastructure_target_2018' => $p->infrastructure_target_2018,
                    'infrastructure_target_2019' => $p->infrastructure_target_2019,
                    'infrastructure_target_2020' => $p->infrastructure_target_2020,
                    'infrastructure_target_2021' => $p->infrastructure_target_2021,
                    'infrastructure_target_2022' => $p->infrastructure_target_2022,
                    'infrastructure_target_2023' => $p->infrastructure_target_2023,
                  ]);

                  return $project;
              });

              $project->bases()->sync(stringToArray($p->bases));
              $project->regions()->sync(stringToArray($p->regions));
              $project->pdp_chapters()->sync(stringToArray($p->pdp_chapters));
              $project->funding_sources()->sync(stringToArray($p->funding_sources));
              $project->ten_point_agenda()->sync(stringToArray($p->ten_point_agenda));
              $project->sustainable_development_goals()->sync(stringToArray($p->sustainable_development_goals));
              $user = User::where('operating_unit_id', $p->operating_unit_id)->first();
              $project->created_by = $user->id ?? null;
          }
        }


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
