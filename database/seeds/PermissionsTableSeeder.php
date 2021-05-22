<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();

        DB::table('permissions')->insert([
        	[
        		'name' => 'create',
        		'guard_name' => 'create'
        	],
        	[
        		'name' => 'read',
        		'guard_name' => 'read'
        	],
        	[
        		'name' => 'update',
        		'guard_name' => 'update'
        	],
        	[
        		'name' => 'delete',
        		'guard_name' => 'delete'
        	],
        	[
        		'name' => 'review',
        		'guard_name' => 'review'
        	],
        	[
        		'name' => 'validate',
        		'guard_name' => 'validate'
        	],
        	[
        		'name' => 'accept',
        		'guard_name' => 'accept'
        	],
        	[
        		'name' => 'approve',
        		'guard_name' => 'approve'
        	],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
