<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayathasilujiansTable extends Migration
{
    public function up()
    {
        Schema::create('riwayathasilujian', function (Blueprint $table) {
            $table->id();

            $table->string('riwayat_jawaban_peserta')->nullable();
            $table->string('riwayat_jawaban_soal')->nullable();
            $table->string('riwayat_bobot_nilai')->nullable();

            $table->unsignedBigInteger('data_id')->nullable()->default(null);
            $table->foreign('data_id')->references('id')->on('data')->onDelete('cascade');
            $table->unsignedBigInteger('soal_id')->nullable()->default(null);
            $table->foreign('soal_id')->references('id')->on('soal')->onDelete('cascade');
            $table->unsignedBigInteger('ukom_id')->nullable()->default(null);
            $table->foreign('ukom_id')->references('id')->on('ukom')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayathasilujian');
    }
}
