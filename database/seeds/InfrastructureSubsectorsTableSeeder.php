<?php

use Illuminate\Database\Seeder;

class InfrastructureSubsectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('infrastructure_subsectors')->truncate();

        DB::table('infrastructure_subsectors')->insert([
          [
            'id' => 1,
            'name' => 'Social Infrastructure',
            'infrastructure_sector_id' => null,
          ],
          [
            'id' => 11,
            'name' => 'Health',
            'infrastructure_sector_id' => 1,
          ],
          [
            'id' => 12,
            'name' => 'Education',
            'infrastructure_sector_id' => 1,
          ],
          [
            'id' => 13,
            'name' => 'Solid Waste Management',
            'infrastructure_sector_id' => 1,
          ],
          [
            'id' => 14,
            'name' => 'Housing',
            'infrastructure_sector_id' => 1,
          ],
          [
            'id' => 15,
            'name' => 'Public Safety/Security',
            'infrastructure_sector_id' => 1,
          ],
          [
            'id' => 2,
            'name' => 'Power - Electrification',
            'infrastructure_sector_id' => null,
          ],
          [
            'id' => 3,
            'name' => 'Transportation',
            'infrastructure_sector_id' => null,
          ],
          [
            'id' => 31,
            'name' => 'Roads and Bridges',
            'infrastructure_sector_id' => 3,
          ],
          [
            'id' => 32,
            'name' => 'Water Transportation',
            'infrastructure_sector_id' => 3,
          ],
          [
            'id' => 33,
            'name' => 'Air Transportation',
            'infrastructure_sector_id' => 3,
          ],
          [
            'id' => 34,
            'name' => 'Rail Transportation',
            'infrastructure_sector_id' => 3,
          ],
          [
            'id' => 35,
            'name' => 'Urban Transportation',
            'infrastructure_sector_id' => 3,
          ],
          [
            'id' => 4,
            'name' => 'Water Resources',
            'infrastructure_sector_id' => null,
          ],
          [
            'id' => 41,
            'name' => 'Irrigation',
            'infrastructure_sector_id' => 4,
          ],
          [
            'id' => 42,
            'name' => 'Water Supply',
            'infrastructure_sector_id' => 4,
          ],
          [
            'id' => 43,
            'name' => 'Flood Management',
            'infrastructure_sector_id' => 4,
          ],
          [
            'id' => 44,
            'name' => 'Sanitation/Sewerage/Septage',
            'infrastructure_sector_id' => 4,
          ],
          [
            'id' => 5,
            'name' => 'Information and Communications Technology',
            'infrastructure_sector_id' => null,
          ],
          [
            'id' => 6,
            'name' => 'Others',
            'infrastructure_sector_id' => null,
          ],
          [
            'id' => 61,
            'name' => 'Urban/Heritage Renewal',
            'infrastructure_sector_id' => 6,
          ],
          [
            'id' => 62,
            'name' => 'Reclamation',
            'infrastructure_sector_id' => 6,
          ],
          [
            'id' => 63,
            'name' => 'Government Building',
            'infrastructure_sector_id' => 6,
          ],
          [
            'id' => 64,
            'name' => 'Multipurpose Facilities',
            'infrastructure_sector_id' => 6,
          ],
          [
            'id' => 65,
            'name' => 'Others',
            'infrastructure_sector_id' => 6,
          ],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
