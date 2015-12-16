<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('providerId')->unsigned()->default(0);
            $table->integer('categoryId')->unsigned()->default(0);
            $table->string('name', 250)->default('');
            $table->text('description');
            $table->string('image', 100)->default('');
            $table->smallInteger('position')->unsigned()->default(0);
            $table->smallInteger('active')->unsigned()->default(0);
            $table->string('slug', 100)->default('');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            //$table->foreign('providerId')->references('id')->on('products_providers');
            //$table->foreign('categoryId')->references('id')->on('products_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
