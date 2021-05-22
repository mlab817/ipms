<?php

use Illuminate\Database\Seeder;

class GadQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
				  [
				    "id" => 1,
				    "name" => "1.0 Participation of women and men in project identification"
				  ],
				  [
				    "id" => 2,
				    "name" => "2.0 Collection of sex-disaggregated data and gender-related information"
				  ],
				  [
				    "id" => 3,
				    "name" => "3.0 Conduct of gender analysis and identification of gender issues"
				  ],
				  [
				    "id" => 4,
				    "name" => "4.0 Gender equality goals, outcomes, and outputs"
				  ],
				  [
				    "id" => 5,
				    "name" => "5.0 Matching of strategies with gender issues"
				  ],
				  [
				    "id" => 6,
				    "name" => "6.0 Gender analysis of the likely impacts of the project"
				  ],
				  [
				    "id" => 7,
				    "name" => "7.0 Monitoring targets and indicators"
				  ],
				  [
				    "id" => 8,
				    "name" => "8.0 Sex-disaggregated database requirement"
				  ],
				  [
				    "id" => 9,
				    "name" => "9.0 Resources"
				  ],
				  [
				    "id" => 10,
				    "name" => "10.0 Relationship with the agency's GAD efforts"
				  ]
				];

				foreach ($questions as $question) {
					DB::table('gad_questions')->insert([
						'id' => $question['id'],
						'name' => $question['name']
					]);
				}
    }
}
