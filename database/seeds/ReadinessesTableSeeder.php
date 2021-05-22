<?php

use Illuminate\Database\Seeder;

class ReadinessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('readinesses')->truncate();

        DB::table('readinesses')->insert([
        	[
        		'id' => 1,
        		'name' => 'Level 1 CIP'
        	],
        	[
        		'id' => 2,
        		'name' => 'Level 2 CIP'
        	],
        	[
        		'id' => 3,
        		'name' => 'Level 3 CIP'
        	],
        	[
        		'id' => 4,
        		'name' => 'Level 4 CIP'
        	],
            [
                'id' => 5,
                'name' => 'Level 1 Non-CIP'
            ],
            [
                'id' => 6,
                'name' => 'Level 2 Non-CIP'
            ],
            [
                'id' => 7,
                'name' => 'Level 3 Non-CIP'
            ],
            [
                'id' => 8,
                'name' => 'Level 4 Non-CIP'
            ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
