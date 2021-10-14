<?php

namespace Database\Seeders;

use App\Models\ProjectReview;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectReview::factory()->count(10)->create();
    }
}
