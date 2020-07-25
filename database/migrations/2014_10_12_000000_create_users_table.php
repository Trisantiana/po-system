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
            $table->increments('id');
            $table->string('name');
            $table->string('email', 80)->unique();
            $table->string('password');
            $table->string('bio');
            $table->unsignedInteger('id_level');
            $table->foreign('id_level')->references('id')->on('users');
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('level', function(Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('nama_level');
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
