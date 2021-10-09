<?php

namespace Database\Seeders;

use App\Models\Pipol;
use App\Models\RefReason;
use Illuminate\Database\Seeder;

class ReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Pipol::REASON_FOR_DROPPING as $key => $reason) {
            RefReason::create([
                'name' => $reason
            ]);
        }
    }
}
