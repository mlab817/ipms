<?php

use Illuminate\Database\Seeder;

class GadSubquestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subquestions = [
				  [
				    "id" => 1,
				    "name" => "1.1 Has the project consulted women and men on the problem or issue that the intervention must solve and on the development of the solution?",
				    "gad_question_id" => 1
				  ],
				  [
				    "id" => 2,
				    "name" => "1.2 Have women's inputs been considered in the design of the project?",
				    "gad_question_id" => 1
				  ],
				  [
				    "id" => 3,
				    "name" => "1.3 Are both women and men seen as stakeholders, partners, or agents of change in the project design?",
				    "gad_question_id" => 1
				  ],
				  [
				    "id" => 4,
				    "name" => "2.1 Has the project tapped sex-disaggregated data and gender-related information from secondary and primary sources at the project identification stage? OR, does the project document include sexdisaggregated and gender information in the analysis of the development issue or problem?",
				    "gad_question_id" => 2
				  ],
				  [
				    "id" => 5,
				    "name" => "3.1 Has a gender analysis been done to identify gender issues prior to project design? OR, does the discussion of development issues in the project document include gender issues that the project must address?",
				    "gad_question_id" => 3
				  ],
				  [
				    "id" => 6,
				    "name" => "4.1 Do project objectives explicitly refer to women and men? Do they target women's agricultural production and marketing needs as well as men's?",
				    "gad_question_id" => 4
				  ],
				  [
				    "id" => 7,
				    "name" => "4.2 Does the project have gender equality outputs or outcomes?",
				    "gad_question_id" => 4
				  ],
				  [
				    "id" => 8,
				    "name" => "5.1 Do the strategies match the gender issues and gender equality goals identified? That is, will the activities or interventions reduce gender gaps and inequalities?",
				    "gad_question_id" => 5
				  ],
				  [
				    "id" => 9,
				    "name" => "5.2 Do the project activities build on women’s and men's knowledge and skills?",
				    "gad_question_id" => 5
				  ],
				  [
				    "id" => 10,
				    "name" => "6.1.1 Is the project addressing the array of women's agricultural activities, including subsistence- and cash-crop activities?",
				    "gad_question_id" => 6
				  ],
				  [
				    "id" => 11,
				    "name" => "6.1.2 Has the project considered how women and men fit their agricultural activities with their other productive, reproductive, and community tasks in scheduling project activities?",
				    "gad_question_id" => 6
				  ],
				  [
				    "id" => 12,
				    "name" => "6.2.1 Will women and men have equal access to credit, extension services, and information, training, or technology to be introduced by the project?",
				    "gad_question_id" => 6
				  ],
				  [
				    "id" => 13,
				    "name" => "6.2.2 Will the project involve female extension officers? Woman farmer leaders?",
				    "gad_question_id" => 6
				  ],
				  [
				    "id" => 14,
				    "name" => "6.2.3 Will the training of agency/project personnel capacitate them for gender-responsive development?",
				    "gad_question_id" => 6
				  ],
				  [
				    "id" => 15,
				    "name" => "6.3.1 Has the project devised strategies to overcome the constraints (including mobility and time constraints for women) to project participation by women and by men?",
				    "gad_question_id" => 6
				  ],
				  [
				    "id" => 16,
				    "name" => "6.3.2. Has the project considered that the constraints to women’s participation may require separate programming (by way of separate groups, activities, or components)? IF SEPARATE PROGRAMMING IS NEEDED => Has the project addressed this?",
				    "gad_question_id" => 6
				  ],
				  [
				    "id" => 17,
				    "name" => "7.1 Does the project include gender equality targets and indicators for welfare, access, consciousness raising participation, and control? For instance, will the following gender differences be monitored => Adoption rates of technology, Membership and leadership in farmers' organization or similar 7.1 groups created by the project, Participation in training and similar project activities, by type of training or activity, and Dispersal of project inputs (animals, seeds or planting materials, credit)",
				    "gad_question_id" => 7
				  ],
				  [
				    "id" => 18,
				    "name" => "8.1 Does the proposed project monitoring framework or plan include the collection of sex-disaggregated data?",
				    "gad_question_id" => 8
				  ],
				  [
				    "id" => 19,
				    "name" => "9.1 Is the budget allotted by the project sufficient for gender equality promotion or integration? Or, will the project tap counterpart funds from LGUs/partners for its GAD efforts?",
				    "gad_question_id" => 9
				  ],
				  [
				    "id" => 20,
				    "name" => "9.2 Does the project have the expertise to promote gender equality and women's empowerment? Or, is the project committed to investing project staff time in building capacities within the project to integrate GAD or promote gender equality?",
				    "gad_question_id" => 9
				  ],
				  [
				    "id" => 21,
				    "name" => "10.1 Will the project build on or strengthen the agency/PCW/government's commitment to the empowerment of women?",
				    "gad_question_id" => 10
				  ],
				  [
				    "id" => 22,
				    "name" => "10.2 Does the project have an exit plan that will ensure the sustainability of GAD efforts and benefits?",
				    "gad_question_id" => 10
				  ],
				  [
				    "id" => 23,
				    "name" => "10.3 Will the project build on the initiatives or actions of other organizations in the area?",
				    "gad_question_id" => 10
				  ]
				];

				foreach ($subquestions as $subquestion) {
					DB::table('gad_subquestions')->insert([
						'id' => $subquestion['id'],
						'name' => $subquestion['name'],
						'gad_question_id' => $subquestion['gad_question_id']
					]);
				}
    }
}
