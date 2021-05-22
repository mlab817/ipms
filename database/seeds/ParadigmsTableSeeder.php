<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParadigmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paradigms = [
          [
            'id' => 1,
            'name' => 'Modernization of Agriculture'
          ],
          [
            'id' => 2,
            'name' => 'Industrialization of Agriculture'
          ],
          [
            'id' => 3,
            'name' => 'Promotion of Exports'
          ],
          [
            'id' => 4,
            'name' => 'Farm Consolidation'
          ],
          [
            'id' => 5,
            'name' => 'Roadmap Development'
          ],
          [
            'id' => 6,
            'name' => 'Infrastructure Development'
          ],
          [
            'id' => 7,
            'name' => 'Higher Budget and Investments for Agriculture'
          ],
          [
            'id' => 8,
            'name' => 'Legislative Support'
          ]
        ];
        
        foreach ($paradigms as $paradigm) {
          DB::table('paradigms')->insert($paradigm);
        }
    }
}
