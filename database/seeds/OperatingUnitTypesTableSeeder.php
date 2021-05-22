<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatingUnitTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('operating_unit_types')->truncate();

        DB::table('operating_unit_types')->insert([
          'id' => 1,
          'name' => 'service',
          'label' => 'Service'
        ]);

        DB::table('operating_unit_types')->insert([
          'id' => 2,
          'name' => 'banner-program',
          'label' => 'Banner Program'
        ]);

        DB::table('operating_unit_types')->insert([
          'id' => 3,
          'name' => 'regional-field-office',
          'label' => 'Regional Field Office'
        ]);

        DB::table('operating_unit_types')->insert([
          'id' => 4,
          'name' => 'bureau',
          'label' => 'Bureau'
        ]);

        DB::table('operating_unit_types')->insert([
          'id' => 5,
          'name' => 'attached-agency',
          'label' => 'Attached Agency'
        ]);

        DB::table('operating_unit_types')->insert([
          'id' => 6,
          'name' => 'attached-corporation',
          'label' => 'Attached Corporation'
        ]);

        DB::table('operating_unit_types')->insert([
          'id' => 7,
          'name' => 'others',
          'label' => 'Others'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
