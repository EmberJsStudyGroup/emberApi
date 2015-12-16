<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CountiesTableSeeder::class);

        $this->call(ProductsProvidersTableSeeder::class);
        $this->call(ProductsCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductsPricesTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(UsersAddressesTableSeeder::class);

        $this->call(OrdersTableSeeder::class);
        $this->call(OrdersAddressesTableSeeder::class);
        $this->call(OrdersDetailsTableSeeder::class);

        Model::reguard();
    }
}
