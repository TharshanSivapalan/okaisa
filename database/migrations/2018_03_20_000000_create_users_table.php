<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id_user')->nullable(false);
            $table->string('last_name', 120);
            $table->string('first_name', 120);
            $table->string('country', 255);
            $table->string('city', 255);
            $table->string('phone', 13);
            $table->string('need', 255);
            $table->string('email', 320)->unique();
            $table->string('password');
            $table->integer('active');
            $table->integer('first_connection');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
