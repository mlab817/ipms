<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TripIndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(database_path('seeders/trip.json')), true);

        \DB::table('ref_trip_indicators')->insert($data);
    }
}
