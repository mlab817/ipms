<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundingSourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');

      DB::table('funding_sources')->truncate();

      DB::table('funding_sources')->insert([
        [
          'id' => 1,
          'name' => 'NG-Local'
        ],
        [
          'id' => 2,
          'name' => 'NG-ODA Loan'
        ],
        [
          'id' => 3,
          'name' => 'NG-ODA Grant'
        ],
        [
          'id' => 4,
          'name' => 'GOCC/GFIs'
        ],
        [
          'id' => 5,
          'name' => 'LGUs'
        ],
        [
          'id' => 6,
          'name' => 'Private Sector'
        ],
        [
          'id' => 7,
          'name' => 'Others'
        ]
      ]);

      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
