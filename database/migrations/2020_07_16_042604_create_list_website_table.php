<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_website', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pelanggan');
            $table->string('nama_website');
            $table->string('url_website');
            $table->string('merk');
            $table->string('wilayah');
            $table->date('tgl_aktif');
            $table->date('tgl_selesai');
            $table->string('periode');
            $table->string('status');
            $table->unsignedInteger('id_jenis_website');

            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('users');
            $table->foreign('id_jenis_website')->references('id')->on('jns_website');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_websites');
    }
}
