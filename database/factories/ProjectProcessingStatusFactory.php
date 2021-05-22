<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use App\User;
use Faker\Generator as Faker;

$factory->define(ProjectProcessingStatus::class, function (Faker $faker) {
    return [
      // 'project_id' => Project::all()->random()->id,
      'processing_status_id' => ProcessingStatus::all()->random()->id,
      'processed_by' => User::where('role_id',3)->get()->random()->id,
      'processed_at' => now(),
      'remarks' => $faker->paragraph
    ];
});
