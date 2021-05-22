<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\OperatingUnit;
use App\Models\Role;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	$email = $faker->unique()->safeEmail;

    return [
        'name' => $faker->name,
        'email' => $email,
        'email_verified_at' => now(),
        'operating_unit_id' => OperatingUnit::all()->random()->id,
        'role_id' => Role::all()->random()->id,
        'unit' => 'Office',
        'position' => $faker->randomElement(['Planning Officer I','Planning Officer II','Planning Officer III', 'Planning Officer IV','Planning Officer V']),
        'password' => Hash::make('password'), // password
        'remember_token' => Str::random(10),
    ];
});
