<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('project_statuses')->truncate();
        /**
         * Equivalent of Implementation Readiness in PIPOL
         *
         * $project->project_status_id
         */
        DB::table('project_statuses')->insert([
          [
            'id' => 1,
            'name' => 'Ongoing' // 1
          ],
          [
            'id' => 2,
            'name' => 'Proposed' // 2
          ],
          [
            'id' => 3,
            'name' => 'Completed' // 3
          ],
          [
            'id' => 4,
            'name' => 'Conceptual Stage'
          ],
          [
            'id' => 5,
            'name' => 'Approved but not yet ongoing'
          ],

          [
            'id' => 6,
            'name' => 'Temporarily Stopped'
          ],
          [
            'id' => 7,
            'name' => 'Cancelled/Terminated'
          ],
          [
            'id' => 8,
            'name' => 'Dropped from pipeline'
          ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
