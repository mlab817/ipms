<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('bases')->truncate();

        DB::table('bases')->insert([
          'id' => 1,
          'name' => 'National Expenditure Program (NEP)'
        ]);

        DB::table('bases')->insert([
          'id' => 2,
          'name' => 'General Appropriations Act (GAA)'
        ]);

        DB::table('bases')->insert([
          'id' => 3,
          'name' => 'Multi-Year Obligational Authority (MYOA)'
        ]);

        DB::table('bases')->insert([
          'id' => 4,
          'name' => 'Existing masterplan/sector studies/procurement plan'
        ]);

        DB::table('bases')->insert([
          'id' => 5,
          'name' => 'List of Regional Development Council-endorsed projects'
        ]);

        DB::table('bases')->insert([
          'id' => 6,
          'name' => 'Agreements (e.g. Peace agreements)'
        ]);

        DB::table('bases')->insert([
          'id' => 7,
          'name' => 'Existing laws, rules or regulations'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
