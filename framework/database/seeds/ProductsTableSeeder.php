<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        \App\Models\Product\Product::create(
            ['providerId'  => 1,
             'categoryId'  => 1,
             'name'        => 'Televizor samsung',
             'description' => 'descriere 1',
             'image'       => 'produs1.png',
             'position'    => 1,
             'active'      => 1,
             'slug'        => 'prod1',]
        );
    }
}
