<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebExpiredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_expired', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pelanggan');
            $table->unsignedInteger('id_website');
            $table->text('expired');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_website')->references('id')->on('list_website')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_expired');
    }
}
