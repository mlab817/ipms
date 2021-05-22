<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
          [
            'id' => 1,
            'country' => 'Philippines',
            'name' => 'Peso',
            'symbol' => 'PHP',
            'convertible' => true
          ],
          [
            'id' => 2,
            'country' => 'United States',
            'name' => 'Dollar',
            'symbol' => 'USD',
            'convertible' => true
          ],
          [
            'id' => 3,
            'country' => 'Japan',
            'name' => 'Yen',
            'symbol' => 'JPY',
            'convertible' => true
          ],
          [
            'id' => 4,
            'country' => 'European Union',
            'name' => 'EURO',
            'symbol' => 'EUR',
            'convertible' => true
          ],
          [
            'id' => 5,
            'country' => 'China',
            'name' => 'Yuan',
            'symbol' => 'CNY',
            'convertible' => true
          ],
          [
            'id' => 6,
            'country' => 'Singapore',
            'name' => 'Dollar',
            'symbol' => 'SGD',
            'convertible' => true
          ],
          [
            'id' => 99,
            'country' => 'Others',
            'name' => 'Others',
            'symbol' => 'OTH',
            'convertible' => false
          ],
        ];

        foreach ($currencies as $currency) {
          \App\Models\Currency::create($currency);
        }
    }
}
