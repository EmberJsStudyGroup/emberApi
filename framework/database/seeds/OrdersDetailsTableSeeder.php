<?php

use Illuminate\Database\Seeder;

class OrdersDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_details')->truncate();

        \App\Models\Order\Details::create(
            ['orderId'   => 1,
             'productId' => 1,
             'name'      => 'Televizor samsubg',
             'unitPrice' => 800,
             'quantity'  => 1]
        );
    }
}
