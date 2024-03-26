<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->id();

            $table->string('soal_kecermatan_original_isi')->nullable();
            $table->string('soal_kategori')->nullable();
            $table->string('soal_kode')->nullable();
            $table->text('soal_isi')->nullable();
            $table->string('soal_isi_gambar')->nullable();
            $table->text('soal_opsi_a')->nullable();
            $table->text('soal_opsi_b')->nullable();
            $table->text('soal_opsi_c')->nullable();
            $table->text('soal_opsi_d')->nullable();
            $table->text('soal_opsi_e')->nullable();
            $table->string('soal_opsi_gambar_a')->nullable();
            $table->string('soal_opsi_gambar_b')->nullable();
            $table->string('soal_opsi_gambar_c')->nullable();
            $table->string('soal_opsi_gambar_d')->nullable();
            $table->string('soal_opsi_gambar_e')->nullable();
            $table->string('soal_jawaban')->nullable();
            $table->integer('soal_bobot_nilai')->nullable();

            $table->unsignedBigInteger('ukom_id')->nullable()->default(null);
            $table->foreign('ukom_id')->references('id')->on('ukom')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('soal');
    }
}
