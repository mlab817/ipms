<?php

use Illuminate\Database\Seeder;

class BannerProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('banner_programs')->truncate();

        DB::table('banner_programs')->insert([
          [
            'name' => 'Not Applicable',
            'acronym' => 'N/A'
          ],
          [
            'name' => 'National Rice Program',
            'acronym' => 'RICE'
          ],
          [
            'name' => 'National Corn Program',
            'acronym' => 'CORN'
          ],
          [
            'name' => 'High Value Crops Development Program',
            'acronym' => 'HVCDP'
          ],
          [
            'name' => 'National Livestock Program',
            'acronym' => 'LIVESTOCK'
          ],
          [
            'name' => 'National Organic Agriculture Program',
            'acronym' => 'NOAP'
          ],
          [
            'name' => 'Halal Food Industry Development Program',
            'acronym' => 'HALAL'
          ],
          [
            'name' => 'Market Development Services Program',
            'acronym' => 'MDS'
          ],
          [
            'name' => 'Farm-to-Market Road Development Program',
            'acronym' => 'FMRDP'
          ],
          [
            'name' => 'Operation and Maintenance of Integrated Laboratories',
            'acronym' => 'ILD'
          ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
