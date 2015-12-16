<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned()->default(0);
            $table->enum('status', ['noua', 'procesata', 'spre livrare', 'livrata', 'anulata', 'finalizata']);
            $table->string('refNo', 50)->default('')->unique();

            $table->string('firstName', 150)->default('');
            $table->string('lastName', 150)->default('');
            $table->string('email', 150)->default('');
            $table->string('phone', 10)->default('');
            $table->decimal('total', 10, 2)->default(0);
            $table->dateTime('processedDate')->nullable();
            $table->dateTime('cancellationDate')->nullable();

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            //$table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
