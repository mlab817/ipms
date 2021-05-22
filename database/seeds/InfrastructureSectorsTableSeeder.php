<?php

use Illuminate\Database\Seeder;

class InfrastructureSectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('infrastructure_sectors')->truncate();

        DB::table('infrastructure_sectors')->insert([
          [
            'id' => 1,
            'name' => 'Social Infrastructure'
          ],
          [
            'id' => 2,
            'name' => 'Power - Electrification'
          ],
          [
            'id' => 3,
            'name' => 'Transportation'
          ],
          [
            'id' => 4,
            'name' => 'Water Resources'
          ],
          [
            'id' => 5,
            'name' => 'Information and Communications Technology'
          ],
          [
            'id' => 6,
            'name' => 'Others'
          ],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
