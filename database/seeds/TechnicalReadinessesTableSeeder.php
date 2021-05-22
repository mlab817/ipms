<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnicalReadinessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('technical_readinesses')->truncate();

        DB::table('technical_readinesses')->insert([
          [
            'id' => 1,
            'name' => 'Pre-Feasibility Study/Business Case'
          ],
          [
            'id' => 2,
            'name' => 'Feasibility Study'
          ],
          [
            'id' => 3,
            'name' => 'Level of Approval'
          ],
          [
            'id' => 4,
            'name' => 'Right-of-Way Acquisition'
          ],
          [
            'id' => 6,
            'name' => 'Resettlement Action Plan'
          ],
          [
            'id' => 7,
            'name' => 'Environmental Compliance Certificate'
          ],
          [
            'id' => 8,
            'name' => 'RDC Endorsement'
          ],
          [
            'id' => 9,
            'name' => 'Detailed Engineering Design'
          ],
          [
            'id' => 10,
            'name' => 'Other Pre-Investment Activities'
          ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
