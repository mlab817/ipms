<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class OperatingUnitPrexcProgramTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'operating_unit_prexc_program';
        $this->csv_delimiter = ',';
        $this->filename = base_path().'/database/seeds/csvs/operating_unit_prexc_program.csv';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table($this->table)->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        parent::run();
    }
}
