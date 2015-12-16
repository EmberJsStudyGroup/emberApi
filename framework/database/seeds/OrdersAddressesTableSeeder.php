<?php

use Illuminate\Database\Seeder;

class OrdersAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_addresses')->truncate();

        \App\Models\Order\Address::create(
            ['orderId'    => 1,
             'countyId'   => 1,
             'city'       => 'Bucuresti',
             'address'    => 'Pipera',
             'zipCode'    => '111111',
             'company'    => 'Steaua',
             'fiscalCode' => 'cod fiscal',
             'regComNr'   => 'registru comert',
             'bank'       => 'ING',
             'iban'       => 'ibanul lui gigi']
        );
    }
}
