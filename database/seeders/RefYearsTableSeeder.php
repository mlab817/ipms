<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RefYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = config('ipms.editor.years');

        $years = collect($years)->map(function ($y) {
            return [
                'id' => $y,
                'name' => $y,
            ];
        });

        \DB::table('ref_years')->truncate();

        \DB::table('ref_years')->insert($years->toArray());
    }
}
