<?php

use Illuminate\Database\Seeder;

class UsersAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_addresses')->truncate();

        \App\Models\User\Address::create(
            ['userId'     => 1,
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

        \App\Models\User\Address::create(
            ['userId'   => 2,
             'countyId' => 2,
             'city'     => 'Bucuresti',
             'address'  => 'Soseaua lui Radoi',
             'zipCode'  => '222222']
        );
    }
}
