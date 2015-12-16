<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->truncate();

        \App\Models\Order\Order::create(
            ['userId'    => 1,
             'status'    => 'noua',
             'refNo'     => uniqid(),
             'firstName' => 'Gigi',
             'lastName'  => 'Becali',
             'email'     => 'gigi.becali@steaua.ro',
             'phone'     => '0723111222',
             'total'     => 800]
        );
    }
}
