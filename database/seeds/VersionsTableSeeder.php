<?php

use Illuminate\Database\Seeder;

class VersionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('versions')->truncate();

        DB::table('versions')->insert([
        	[
        		'version' => '1.0.0',
  		    	'change_type' => 'First Release',
  		    	'change_log' => 'First release',
  		    	'notes' => 'First release',
  		    	'user_id' => 1
        	]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
