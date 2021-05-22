<?php

use Illuminate\Database\Seeder;

class SubmissionStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('submission_statuses')->truncate();

        DB::table('submission_statuses')->insert([
          [
            'id' => 1,
            'name' => 'Draft'
          ],
          [
            'id' => 2,
            'name' => 'Finalized'
          ],
          [
            'id' => 3,
            'name' => 'Endorsed'
          ],
          [
            'id' => 4,
            'name' => 'Validated'
          ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
