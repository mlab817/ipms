<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('roles')->truncate();

        DB::table('roles')->insert([
          'id' => 1,
          'name' => 'superadmin',
          'ident' => 'superadmin',
          'description' => 'Changes global settings',
          'active' => 1,
          'level' => 99
        ]);

        DB::table('roles')->insert([
          'id' => 2,
          'name' => 'admin',
          'ident' => 'admin',
          'description' => 'Assigns roles to users',
          'active' => 1,
          'level' => 99
        ]);

        DB::table('roles')->insert([
          'id' => 3,
          'name' => 'reviewer',
          'ident' => 'reviewer',
          'description' => 'Reviews inputs of assigned operating units',
          'active' => 1,
          'level' => 99
        ]);

        DB::table('roles')->insert([
          'id' => 4,
          'name' => 'encoder',
          'ident' => 'encoder',
          'description' => 'Provides inputs to the sytem',
          'active' => 1,
          'level' => 99
        ]);

        DB::table('roles')->insert([
            'id' => 5,
            'name' => 'viewer',
            'ident' => 'viewer',
            'description' => 'Views inputs to the sytem',
            'active' => 1,
            'level' => 99
        ]);

        DB::table('roles')->insert([
            'id' => 6,
            'name' => 'lead',
            'ident' => 'lead',
            'description' => 'Accepts projects',
            'active' => 1,
            'level' => 99
        ]);

        DB::table('roles')->insert([
            'id' => 7,
            'name' => 'chief',
            'ident' => 'chief',
            'description' => 'Approve projects',
            'active' => 1,
            'level' => 99
        ]);

        DB::table('roles')->insert([
          'id' => 99,
          'name' => 'guest',
          'ident' => 'guest',
          'description' => 'Can view things',
          'active' => 1,
          'level' => 99
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
