<?php

use Illuminate\Database\Seeder;

class CipTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('cip_types')->truncate();

        DB::table('cip_types')->insert([
        	[
        		'id' => 1,
        		'name' => 'Locally-funded major capital PAPs with TPC of PhP 2.5B and above'
        	],
        	[
        		'id' => 2,
        		'name' => 'ODA grant-assisted PAPs with TPC of PhP2.5B and above'
        	],
        	[
        		'id' => 3,
        		'name' => 'ODA loan-assisted PAPs regardless of amount requiring NG guarantee'
        	],
        	[
        		'id' => 4,
        		'name' => 'Solicited national PPP PAPs'
        	],
        	[
        		'id' => 5,
        		'name' => 'JV PAPs with government contribution of at least PhP150M'
        	],
        	[
        		'id' => 6,
        		'name' => 'Administrative buildings with total project cost of at least PhP1B'
        	],
        	[
        		'id' => 7,
        		'name' => 'All new PAPs which will require ICC approvals based on existing laws, rules and regulations'
        	],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
