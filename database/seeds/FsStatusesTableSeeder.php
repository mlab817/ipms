<?php

use Illuminate\Database\Seeder;

class FsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('fs_statuses')->truncate();

        DB::table('fs_statuses')->insert([
        	[
        		'id' => 1,
        		'name' => 'Completed'
        	],
        	[
        		'id' => 2,
        		'name' => 'Ongoing'
        	],
        	[
        		'id' => 3,
        		'name' => 'For Preparation'
        	]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
