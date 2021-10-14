<?php

namespace Database\Factories;

use App\Models\RefCipType;
use App\Models\RefPipTypology;
use App\Models\Project;
use App\Models\ProjectReview;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pip = $this->faker->boolean;
        $cip = $this->faker->boolean;
        $trip = $this->faker->boolean;

        return [
            'project_id'        => Project::doesntHave('review')->get()->random()->id,
            'pip'               => $pip,
            'pip_typology_id'   => $pip ? RefPipTypology::all()->random()->id : null,
            'cip'               => $cip,
            'cip_type_id'       => $cip ? RefCipType::all()->random()->id : null,
            'trip'              => $trip,
        ];
    }
}
