<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Currency;
use App\Models\FundingSource;
use App\Models\ImplementationMode;
use App\Models\OperatingUnit;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\SpatialCoverage;
use App\Models\Tier;
use App\Models\Type;
use App\Models\Typology;
use App\User;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'pip' => $faker->boolean,
        'cip' => $faker->boolean,
        'trip' => $faker->boolean,
        'rdip' => $faker->boolean,
        'pcip' => $faker->boolean,
        'afmip' => $faker->boolean,
        'title' => $faker->sentence,
        'operating_unit_id' => OperatingUnit::all()->random()->id,
        'type_id' => Type::all()->random()->id,
        'typology_id' => Typology::all()->random()->id,
        'spatial_coverage_id' => SpatialCoverage::all()->random()->id,
        'cities_municipalities' => $faker->sentence,
        'implementation_mode_id' => ImplementationMode::all()->random()->id,
        'main_funding_source_id' => FundingSource::all()->random()->id,
        'description' => $faker->paragraph,
        'goals' => $faker->sentence,
        'outcomes' => $faker->sentence,
        'purpose' => $faker->sentence,
        'expected_outputs' => $faker->paragraph,
        'priority_ranking' => $faker->randomNumber(),
        'currency_id' => Currency::all()->random()->id,
        'total_project_cost' => $faker->randomNumber() * 1000,
        'employment_generated' => $faker->randomNumber(),
        'target_start_year' => $faker->numberBetween(2016,2030),
        'target_end_year' => $faker->numberBetween(2016,2030),
        'implementation_risk' => $faker->paragraph,
        'mitigation_strategy' => $faker->paragraph,
        'income_increase' => $faker->paragraph,
        'financial_benefit_cost_ratio' => $faker->randomFloat(2,0,10),
        'financial_net_present_value' => $faker->randomNumber() * 1000,
        'financial_internal_rate_return' => $faker->randomNumber(),
        'economic_benefit_cost_ratio' => $faker->randomFloat(2,0,10),
        'economic_net_present_value' => $faker->randomNumber() * 1000,
        'economic_internal_rate_return' => $faker->randomNumber(),
        'project_status_id' => ProjectStatus::all()->random()->id,
        'estimated_project_life' => $faker->numberBetween(1,20) . ' years',
        'tier_id' => Tier::all()->random()->id,
        'gad_score' => $faker->numberBetween(0,100),
        'investment_target_2016' => $faker->randomFloat() * 1000,
        'investment_target_2017' => $faker->randomFloat() * 1000,
        'investment_target_2018' => $faker->randomFloat() * 1000,
        'investment_target_2019' => $faker->randomFloat() * 1000,
        'investment_target_2020' => $faker->randomFloat() * 1000,
        'investment_target_2021' => $faker->randomFloat() * 1000,
        'investment_target_2022' => $faker->randomFloat() * 1000,
        'investment_target_2023' => $faker->randomFloat() * 1000,
        'investment_target_total' => $faker->randomFloat() * 1000,
        'infrastructure_target_2016' => $faker->randomFloat() * 1000,
        'infrastructure_target_2017' => $faker->randomFloat() * 1000,
        'infrastructure_target_2018' => $faker->randomFloat() * 1000,
        'infrastructure_target_2019' => $faker->randomFloat() * 1000,
        'infrastructure_target_2020' => $faker->randomFloat() * 1000,
        'infrastructure_target_2021' => $faker->randomFloat() * 1000,
        'infrastructure_target_2022' => $faker->randomFloat() * 1000,
        'infrastructure_target_2023' => $faker->randomFloat() * 1000,
        'infrastructure_target_total' => $faker->randomFloat() * 1000,
        'nep_2016' => $faker->randomFloat() * 1000,
        'nep_2017' => $faker->randomFloat() * 1000,
        'nep_2018' => $faker->randomFloat() * 1000,
        'nep_2019' => $faker->randomFloat() * 1000,
        'nep_2020' => $faker->randomFloat() * 1000,
        'nep_2021' => $faker->randomFloat() * 1000,
        'nep_2022' => $faker->randomFloat() * 1000,
        'nep_2023' => $faker->randomFloat() * 1000,
        'nep_total' => $faker->randomFloat() * 1000,
        'gaa_2016' => $faker->randomFloat() * 1000,
        'gaa_2017' => $faker->randomFloat() * 1000,
        'gaa_2018' => $faker->randomFloat() * 1000,
        'gaa_2019' => $faker->randomFloat() * 1000,
        'gaa_2020' => $faker->randomFloat() * 1000,
        'gaa_2021' => $faker->randomFloat() * 1000,
        'gaa_2022' => $faker->randomFloat() * 1000,
        'gaa_2023' => $faker->randomFloat() * 1000,
        'gaa_total' => $faker->randomFloat() * 1000,
        'disbursement_2016' => $faker->randomFloat() * 1000,
        'disbursement_2017' => $faker->randomFloat() * 1000,
        'disbursement_2018' => $faker->randomFloat() * 1000,
        'disbursement_2019' => $faker->randomFloat() * 1000,
        'disbursement_2020' => $faker->randomFloat() * 1000,
        'disbursement_2021' => $faker->randomFloat() * 1000,
        'disbursement_2022' => $faker->randomFloat() * 1000,
        'disbursement_2023' => $faker->randomFloat() * 1000,
        'disbursement_total' => $faker->randomFloat() * 1000,
        'updates' => $faker->sentence,
        'updates_date' => $faker->date('Y-m-d', 'now'),
        'created_by' => App\User::where('role_id',4)->get()->random()->id
    ];
});
