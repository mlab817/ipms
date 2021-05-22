<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class PipolStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('pipol_statuses')->insert([
		    [
			    'id' => 1,
			    'name' => 'Draft',
			    'slug' => Str::slug('Draft')
		    ],
		    [
			    'id' => 2,
			    'name' => 'Finalized',
			    'slug' => Str::slug('Finalized')
		    ],
		    [
			    'id' => 3,
			    'name' => 'Endorsed',
			    'slug' => Str::slug('Endorsed')
		    ],
	    ]);
    }
}
