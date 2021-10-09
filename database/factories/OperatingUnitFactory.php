<?php

namespace Database\Factories;

use App\Models\RefOperatingUnit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OperatingUnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RefOperatingUnit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company = $this->faker->company;

        return [
            'name'  => $company,
            'slug'  => Str::slug($company),
        ];
    }
}
