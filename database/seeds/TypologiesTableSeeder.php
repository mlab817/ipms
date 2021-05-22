<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('typologies')->truncate();

        DB::table('typologies')->insert([
          'id' => 1,
          'name' => 'Capital Investment Programs/Projects'
        ]);

        DB::table('typologies')->insert([
          'id' => 2,
          'name' => 'Technical Assistance'
        ]);

        DB::table('typologies')->insert([
          'id' => 3,
          'name' => 'Relending PAPs'
        ]);

        DB::table('typologies')->insert([
          'id' => 4,
          'name' => 'Government Building'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
