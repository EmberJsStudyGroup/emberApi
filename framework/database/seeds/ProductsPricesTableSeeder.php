<?php

use Illuminate\Database\Seeder;

class ProductsPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_prices')->truncate();

        \App\Models\Product\Price::create(
            ['productId' => 1,
             'name'      => '100 inch',
             'value'     => 800]
        );

        \App\Models\Product\Price::create(
            ['productId' => 1,
             'name'      => '150 inch',
             'value'     => 2000]
        );
    }
}
