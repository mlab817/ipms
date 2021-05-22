<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpatialCoveragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('spatial_coverages')->truncate();

        DB::table('spatial_coverages')->insert([
            [
                'id' => 1,
                'name' => 'Nationwide',
                'label' => 'Nationwide',
                'slug' => 'nationwide'
            ],
            [
                'id' => 2,
                'name' => 'Inter-regional',
                'label' => 'Inter-regional',
                'slug' => 'inter-regional'
            ],
            [
                'id' => 3,
                'name' => 'Region-Specific',
                'label' => 'Region-Specific',
                'slug' => 'region-specific'
            ],
            [
                'id' => 4,
                'name' => 'Abroad',
                'label' => 'Abroad',
                'slug' => 'abroad'
            ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
