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

            $table->string('soal_kode')->nullable();
            $table->text('soal_isi')->nullable();
            $table->text('soal_isi_file')->nullable();
            $table->text('soal_opsi_a')->nullable();
            $table->text('soal_opsi_b')->nullable();
            $table->text('soal_opsi_c')->nullable();
            $table->text('soal_opsi_d')->nullable();
            $table->text('soal_opsi_e')->nullable();
            $table->string('soal_opsi_file_a')->nullable();
            $table->string('soal_opsi_file_b')->nullable();
            $table->string('soal_opsi_file_c')->nullable();
            $table->string('soal_opsi_file_d')->nullable();
            $table->string('soal_opsi_file_e')->nullable();
            $table->string('soal_jawaban')->nullable();
            $table->string('soal_bobot_nilai')->nullable();

            // $table->unsignedBigInteger('login_id')->nullable()->default(null);
            // $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

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
