<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned()->default(0);
            $table->integer('countyId')->unsigned()->default(0);
            $table->string('city', 100)->default('');
            $table->string('address', 250)->default('');
            $table->string('zipCode', 10)->default('');
            $table->string('company', 250)->default('');
            $table->string('fiscalCode', 150)->default('');
            $table->string('regComNr', 150)->default('');
            $table->string('bank', 150)->default('');
            $table->string('iban', 50)->default('');

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            //$table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('countyId')->references('id')->on('counties')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_addresses');
    }
}
