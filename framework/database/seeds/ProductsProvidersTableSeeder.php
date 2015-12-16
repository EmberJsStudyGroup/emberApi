<?php

use Illuminate\Database\Seeder;

class ProductsProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_providers')->truncate();

        \App\Models\Product\Provider::create(
            ['name'    => 'Samsung',
             'website' => 'www.samsung.com',
             'logo'    => 'samsung.png',
             'slug'    => 'samsung',]
        );
    }
}
