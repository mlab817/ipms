<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    public function run()
    {
        $this->call(\Encore\Admin\Auth\Database\AdminTablesSeeder::class);
    }
}