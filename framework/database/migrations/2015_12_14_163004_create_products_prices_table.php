<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productId')->unsigned()->default(0);
            $table->string('name', 250)->default('');
            $table->decimal('value', 10, 2)->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            //$table->foreign('productId')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products_prices');
    }
}
