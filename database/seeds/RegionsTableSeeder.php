<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class RegionsTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'regions';
        $this->csv_delimiter = ',';
        $this->filename = base_path().'/database/seeds/csvs/regions.csv';
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

         DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table($this->table)->truncate();

         DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // Uncomment the below to wipe the table clean before populating

        parent::run();
    }
}
