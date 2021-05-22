<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundingInstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('funding_institutions')->truncate();

        DB::table('funding_institutions')->insert([
            [
                "name" => 'Australia'
            ],
            [
                "name" => 'Austria'
            ],
            [
                "name" => 'China'
            ],
            [
                "name" => 'Japan'
            ],
            [
                "name" => 'Japan International Cooperation Agency '
            ],
            [
                "name" => 'Korea'
            ],
            [
                "name" => 'Korea International Cooperation Agency '
            ],
            [
                "name" =>
                    'Korea Eximbank Resident Mission / Economic Development Cooperation Fund'
            ],
            [
                "name" => 'New Zealand'
            ],
            [
                "name" => 'Saudi Arabia'
            ],
            [
                "name" => 'Saudi Fund for Development'
            ],
            [
                "name" => 'Belgium'
            ],
            [
                "name" => 'Canada'
            ],
            [
                "name" => 'Denmark'
            ],
            [
                "name" => 'European Union'
            ],
            [
                "name" => 'European Investment Bank'
            ],
            [
                "name" => 'France'
            ],
            [
                "name" => 'French Development Agency Philippines'
            ],
            [
                "name" => 'Germary'
            ],
            [
                "name" => 'Germany Agency for International Cooperation'
            ],
            [
                "name" => 'German Development Bank'
            ],
            [
                "name" => 'Federal Ministry for Economic Cooperation and Development'
            ],
            [
                "name" => 'Hungary'
            ],
            [
                "name" => 'Italy'
            ],
            [
                "name" => 'Netherlands'
            ],
            [
                "name" => 'Norway'
            ],
            [
                "name" => 'Nordic Investment Bank'
            ],
            [
                "name" => 'Poland'
            ],
            [
                "name" => 'Spain'
            ],
            [
                "name" => 'Agencia Espanola de Cooperation International para el Desarollo'
            ],
            [
                "name" => 'Sweden/Swedish International Development Cooperation Agency'
            ],
            [
                "name" => 'Switzerland'
            ],
            [
                "name" => 'United Kingdom'
            ],
            [
                "name" => 'United States'
            ],
            [
                "name" => 'United States Agency for International Development'
            ],
            [
                "name" => 'Asian Development Bank'
            ],
            [
                "name" => 'World Bank'
            ],
            [
                "name" => 'United Nations Coordination Office'
              ],
              [
                  "name" => 'Food and Agriculture Organization'
              ],
              [
                  "name" => 'United Nations Development Programme'
              ],
              [
                  "name" => 'United Nations Industrial Development Organization'
              ],
              [
                  "name" => 'United Nations Population Fund'
              ],
              [
                  "name" => 'International Fund for Agricultural Development'
              ],
              [
                  "name" => 'International Labor Organization'
              ],
              [
                  "name" => "United Nations Children's Fund"
              ],
              [
                  "name" => 'International Atomic Energy Agency'
              ],
              [
                  "name" => 'OPEC Fund for International Development'
              ],
              [
                  "name" => 'World Food Programme'
              ],
              [
                  "name" => 'World Health Organization'
              ],
              [
                  "name" => 'To be detemined'
              ],
              [
                  "name" => 'Others'
              ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
