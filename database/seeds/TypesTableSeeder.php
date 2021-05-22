<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('types')->truncate();

        DB::table('types')->insert([
          [
            'id' => 1,
            'name' => 'Locally Funded Project',
            'label' => 'LFP'
          ],
          [
            'id' => 2,
            'name' => 'Foreign Assisted Project',
            'label' => 'FAP'
          ],
          [
            'id' => 3,
            'name' => 'Program',
            'label' => 'Program'
          ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
