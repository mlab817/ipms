<?php

namespace Database\Seeders;

use App\Models\RefPdpIndicator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class IndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Schema::disableForeignKeyConstraints();

        \DB::table('project_pdp_indicator')->truncate();

        \DB::table('ref_pdp_indicators')->truncate();

        $data = File::get(database_path('seeders/indicators.json'));

        $json = json_decode($data);

        foreach ($json as $chapter) {
            $children = $chapter->children ?? [];
            // outcomes
            if (count($children)) {
                foreach ($children as $child) {
                    $outcome = RefPdpIndicator::create([
                        'name' => $child->name,
                        'ref_pdp_chapter_id' => $chapter->id,
                        'level' => 1,
                    ]);

                    $suboutcomes = $child->children ?? [];

                    if (count($suboutcomes)) {
                        foreach ($suboutcomes as $child2) {
                            $suboutcome = RefPdpIndicator::create([
                                'name' => $child2->name,
                                'parent_id' => $outcome->id,
                                'level' => 2,
                            ]);

                            $indicators = $child2->children ?? [];

                            if (count($indicators)) {
                                foreach ($indicators as $child3) {
                                    $indicator = RefPdpIndicator::create([
                                        'name' => $child3->name,
                                        'parent_id' => $suboutcome->id,
                                        'level' => 3,
                                    ]);
                                }
                            }
                        }
                    }
                }

            }
        }

        \Schema::enableForeignKeyConstraints();

        // php artisan db:seed IndicatorsTableSeeder
    }
}
