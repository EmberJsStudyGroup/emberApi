<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250)->default('');
            $table->string('website', 250)->default('');
            $table->string('logo', 100)->default('');
            $table->string('slug', 100)->default('');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products_providers');
    }
}
