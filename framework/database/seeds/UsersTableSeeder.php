<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        \App\Models\User\User::create(
            ['email'     => 'gigi.becali@steaua.ro',
             'password'  => \Illuminate\Support\Facades\Hash::make('test123'),
             'firstName' => 'Gigi',
             'lastName'  => 'Becali',
             'phone'     => '0723111222',
             'active'    => 1]
        );

        \App\Models\User\User::create(
            ['email'     => 'mirel.radoi@steaua.ro',
             'password'  => \Illuminate\Support\Facades\Hash::make('test123'),
             'firstName' => 'Mirel',
             'lastName'  => 'Radoi',
             'phone'     => '0723333444',
             'active'    => 1]
        );
    }
}
