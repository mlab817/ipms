<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcessingStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('processing_statuses')->truncate();

        DB::table('processing_statuses')->insert([
            [
                'id' => 1,
                'name' => 'created'
            ],
            [
                'id' => 2,
                'name' => 'updated'
            ],
            [
                'id' => 3,
                'name' => 'finalized'
            ],
            [
                'id' => 4,
                'name' => 'endorsed'
            ],
            [
                'id' => 5,
                'name' => 'returned'
            ],
            [
                'id' => 6,
                'name' => 'validated'
            ],
            [
                'id' => 7,
                'name' => 'reviewed'
            ],
            [
                'id' => 8,
                'name' => 'rejected'
            ],
            [
                'id' => 9,
                'name' => 'accepted'
            ],
            [
                'id' => 10,
                'name' => 'disapproved'
            ],
            [
                'id' => 11,
                'name' => 'approved'
            ],
            [
                'id' => 12,
                'name' => 'encoded'
            ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
