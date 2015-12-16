<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 150)->default('')->unique();
            $table->string('password', 250)->default('');
            $table->string('firstName', 150)->default('');
            $table->string('lastName', 150)->default('');
            $table->string('phone', 10)->default('');
            $table->smallInteger('active')->default(1)->unsigned();

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
