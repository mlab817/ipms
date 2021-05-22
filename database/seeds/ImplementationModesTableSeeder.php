<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImplementationModesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('implementation_modes')->truncate();

        // Updated id's to much PIPOL system
        DB::table('implementation_modes')->insert([
          'id' => 74,
          'name' => 'Through Local Funds in accordance with RA 9184 or the Government Procurement Act'
        ]);

        DB::table('implementation_modes')->insert([
          'id' => 75,
          'name' => 'Through ODA pursuant to RA 8182 or the ODA Act of 1996'
        ]);

        DB::table('implementation_modes')->insert([
          'id' => 76,
          'name' => 'Through PPP under the Amended BOT Law and Its IRR'
        ]);

        DB::table('implementation_modes')->insert([
          'id' => 77,
          'name' => 'Through Joint Venture Arrangement'
        ]);

        DB::table('implementation_modes')->insert([
          'id' => 78,
          'name' => 'Others'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
