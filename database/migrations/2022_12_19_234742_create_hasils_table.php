<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilsTable extends Migration
{
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->id();

            $table->string('hasil_total_nilai')->nullable();
            $table->string('hasil_benar')->nullable();
            $table->string('hasil_salah')->nullable();

            $table->unsignedBigInteger('data_id')->nullable()->default(null);
            $table->foreign('data_id')->references('id')->on('data')->onDelete('cascade');
            $table->unsignedBigInteger('ukom_id')->nullable()->default(null);
            $table->foreign('ukom_id')->references('id')->on('ukom')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil');
    }
}
