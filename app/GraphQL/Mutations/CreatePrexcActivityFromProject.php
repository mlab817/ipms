<?php

namespace App\GraphQL\Mutations;

use App\Models\PrexcActivity;
use App\Models\Project;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class CreatePrexcActivityFromProject
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        // TODO implement the resolver
        $prexc_activity = null;

        $project = Project::find($args['id']);

        if (! $project) {
          // project not found
          return null;
        }

        // assign submission_status_id to draft
        $prexc_activity = PrexcActivity::create([
          'name' => $project->title,
          'operating_unit_id' => $project->operating_unit_id,
          'prexc_program_id' => $project->prexc_program_id,
          'prexc_subprogram_id' => $project->prexc_subprogram_id,
          'banner_program_id' => $project->banner_program_id,
          'uacs_code' => $project->uacs_code,
          'project_id' => $project->id,
          'trip' => $project->trip,
          'tier_id' => $project->tier_id,
          'investment_target_2016' => $project->investment_target_2016,
          'investment_target_2017' => $project->investment_target_2017,
          'investment_target_2018' => $project->investment_target_2018,
          'investment_target_2019' => $project->investment_target_2019,
          'investment_target_2020' => $project->investment_target_2020,
          'investment_target_2021' => $project->investment_target_2021,
          'investment_target_2022' => $project->investment_target_2022,
          'investment_target_2023' => $project->investment_target_2023,
          'investment_target_2024' => $project->investment_target_2024,
          'investment_target_2025' => $project->investment_target_2025,
          'investment_target_total' => $project->investment_target_total,
          'infrastructure_target_2016' => $project->infrastructure_target_2016,
          'infrastructure_target_2017' => $project->infrastructure_target_2017,
          'infrastructure_target_2018' => $project->infrastructure_target_2018,
          'infrastructure_target_2019' => $project->infrastructure_target_2019,
          'infrastructure_target_2020' => $project->infrastructure_target_2020,
          'infrastructure_target_2021' => $project->infrastructure_target_2021,
          'infrastructure_target_2022' => $project->infrastructure_target_2022,
          'infrastructure_target_2023' => $project->infrastructure_target_2023,
          'infrastructure_target_2024' => $project->infrastructure_target_2024,
          'infrastructure_target_2025' => $project->infrastructure_target_2025,
          'infrastructure_target_total' => $project->infrastructure_target_total,
          'gaa_2016' => $project->gaa_2016,
          'gaa_2017' => $project->gaa_2017,
          'gaa_2018' => $project->gaa_2018,
          'gaa_2019' => $project->gaa_2019,
          'gaa_2020' => $project->gaa_2020,
          'gaa_2021' => $project->gaa_2021,
          'gaa_2022' => $project->gaa_2022,
          'gaa_2023' => $project->gaa_2023,
          'gaa_2024' => $project->gaa_2024,
          'gaa_2025' => $project->gaa_2025,
          'gaa_total' => $project->gaa_total,
          'nep_2016' => $project->nep_2016,
          'nep_2017' => $project->nep_2017,
          'nep_2018' => $project->nep_2018,
          'nep_2019' => $project->nep_2019,
          'nep_2020' => $project->nep_2020,
          'nep_2021' => $project->nep_2021,
          'nep_2022' => $project->nep_2022,
          'nep_2023' => $project->nep_2023,
          'nep_2024' => $project->nep_2024,
          'nep_2025' => $project->nep_2025,
          'nep_total' => $project->nep_total,
          'disbursement_2016' => $project->disbursement_2016,
          'disbursement_2017' => $project->disbursement_2017,
          'disbursement_2018' => $project->disbursement_2018,
          'disbursement_2019' => $project->disbursement_2019,
          'disbursement_2020' => $project->disbursement_2020,
          'disbursement_2021' => $project->disbursement_2021,
          'disbursement_2022' => $project->disbursement_2022,
          'disbursement_2023' => $project->disbursement_2023,
          'disbursement_2024' => $project->disbursement_2024,
          'disbursement_2025' => $project->disbursement_2025,
          'disbursement_total' => $project->disbursement_total,
          'submission_status_id' => $project->submission_status_id,
          'created_by' => $context->user()->id
        ]);

        // after creating the prexc_activity, add the prexc_activity_id to project
        $project->prexc_activity_id = $prexc_activity->id;
        $project->save();

        return $prexc_activity;
    }
}
