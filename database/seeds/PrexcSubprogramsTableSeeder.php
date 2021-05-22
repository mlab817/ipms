<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class PrexcSubprogramsTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'prexc_subprograms';
        $this->csv_delimiter = ',';
        $this->filename = base_path().'/database/seeds/csvs/prexc_subprograms.csv';
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table($this->table)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        parent::run();
    }
}
