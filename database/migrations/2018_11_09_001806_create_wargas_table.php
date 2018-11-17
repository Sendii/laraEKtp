<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat');
            $table->string('tgl_lahir');
            $table->string('jenkel');
            $table->string('gol_dar');
            $table->string('alamatjalan');
            $table->string('alamatrt');
            $table->string('alamatrw');
            $table->string('alamatkelurahan');
            $table->string('alamatkecamatan');
            $table->string('alamatprovinsi');
            $table->string('agama');
            $table->string('status');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            $table->string('berlakuhingga');
            $table->string('foto_warga');
            $table->string('foto_ttd');
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
        Schema::dropIfExists('wargas');
    }
}
