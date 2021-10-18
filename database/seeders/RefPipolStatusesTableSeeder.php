<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RefPipolStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            'Draft',
            'Endorsed',
            'Validated',
            'Dropped',
        ];

        $seeds = collect($seeds)->map(function ($s) {
            return [
                'name' => $s,
                'label' => $s,
            ];
        });

        \DB::table('ref_pipol_statuses')->insert($seeds->toArray());
    }
}
