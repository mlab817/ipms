<?php

use Illuminate\Database\Seeder;

class GadChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $choices = [
				  [
				    "id" => 1,
				    "name" => "No",
				    "value" => 0
				  ],
				  [
				    "id" => 2,
				    "name" => "Partly Yes",
				    "value" => 0.33
				  ],
				  [
				    "id" => 3,
				    "name" => "Yes",
				    "value" => 0.67
				  ],
				  [
				    "id" => 4,
				    "name" => "Partly Yes",
				    "value" => 1
				  ],
				  [
				    "id" => 5,
				    "name" => "Yes",
				    "value" => 2
				  ],
				  [
				    "id" => 6,
				    "name" => "Partly Yes",
				    "value" => 0.5
				  ],
				  [
				    "id" => 7,
				    "name" => "Yes",
				    "value" => 1
				  ],
				  [
				    "id" => 8,
				    "name" => "Partly Yes",
				    "value" => 0.17
				  ],
				  [
				    "id" => 9,
				    "name" => "Yes",
				    "value" => 0.33
				  ]
				];

				foreach ($choices as $choice) {
					DB::table('gad_choices')->insert([
						'id' => $choice['id'],
						'name' => $choice['name'],
						'value' => $choice['value']
					]);
				}
    }
}
