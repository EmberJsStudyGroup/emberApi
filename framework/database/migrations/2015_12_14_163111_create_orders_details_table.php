<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderId')->unsigned()->default(0);
            $table->integer('productId')->unsigned()->default(0);
            $table->string('name', 250)->default('');
            $table->decimal('unitPrice', 10, 2)->default(0);
            $table->integer('quantity')->default(1);

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            //$table->foreign('orderId')->references('id')->on('orders')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders_details');
    }
}
