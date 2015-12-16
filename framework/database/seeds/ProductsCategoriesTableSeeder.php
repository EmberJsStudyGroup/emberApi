<?php

use Illuminate\Database\Seeder;

class ProductsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_categories')->truncate();

        \App\Models\Product\Category::create(
            ['name'    => 'Televizoare',
             'slug'    => 'televizoare',]
        );
    }
}
