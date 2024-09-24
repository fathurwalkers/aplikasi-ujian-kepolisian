<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiansTable extends Migration
{
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->id();

            $table->string('ujian_nama')->nullable();
            $table->integer('ujian_menit')->nullable();
            $table->string('ujian_jumlah_soal')->nullable();
            $table->string('ujian_tanggal_dibuat')->nullable();
            $table->string('ujian_token')->nullable();
            $table->string('ujian_status')->nullable(); // AKTIF - TIDAK AKTIF

            $table->unsignedBigInteger('ukom_id')->nullable()->default(null);
            $table->foreign('ukom_id')->references('id')->on('ukom')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ujian');
    }
}
