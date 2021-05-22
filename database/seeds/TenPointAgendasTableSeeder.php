<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenPointAgendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $seeds = [
        [
          'id' => 1,
          'name' => "Continue and maintain the current macroeconomic policies, including fiscal, monetary and trade policy"
        ],
        [
          'id' => 2,
          'name' => "Institute progressive tax reform and more effective tax collection, indexing taxes to inflation. A tax reform package will be submitted to Congress by September 2016.",
        ],
        [
          'id' => 3,
          'name' => "Increase competitiveness and the ease of doing business. This effort will draw upon successful models used to attract business to local cities (e.g., Davao), and pursue the relaxation of the Constitutional restrictions on foreign ownership, except as regards land ownership, in order to attract foreign investments"
        ],
        [
          'id' => 4,
          'name' => "Accelerate annual infrastructure spending to account for 5% of GDP, with Public-Private Partnerships playing a key role",
        ],
        [
          'id' => 5,
          'name' => "Promote rural and value chain development toward increasing agricultural and rural enterprise productivity and rural tourism."
        ],
        [
          'id' => 6,
          'name' => "Ensure security of land tenure to encourage investments, and address bottlenecks in land management and titling agencies."
        ],
        [
          'id' => 7,
          'name' => "Invest in human capital development, including health and education systems, and match skills and training to meet the demand of businesses and the private sector.",
        ],
        [
          'id' => 8,
          'name' => "Promote science, technology, and the creative arts to enhance innovation and creative capacity towards self-sustaining, inclusive development.",
        ],
        [
          'id' => 9,
          'name' => "Improve social protection programs, including the government's Conditional Cash Transfer program, to protect the poor against instability and economic shocks.",
        ],
        [
          'id' => 10,
          'name' => "Strengthen implementation of the Responsible Parenthood and Reproductive Health Law to enable especially poor couples to make informed choices on financial and family planning.",
        ],
        [
          'id' => 0,
          'name' => "Peace and Order"
        ]
      ];

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');

      DB::table('ten_point_agendas')->truncate();

      foreach ($seeds as $seed) {
          DB::table('ten_point_agendas')->insert([
            'id' => $seed['id'],
            'name' => $seed['name']
          ]);
      }

      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
