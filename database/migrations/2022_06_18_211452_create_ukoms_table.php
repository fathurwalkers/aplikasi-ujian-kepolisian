<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkomsTable extends Migration
{
    public function up()
    {
        Schema::create('ukom', function (Blueprint $table) {
            $table->id();

            $table->string('ukom_kategori')->nullable(); // REGULER - KECERMATAN
            $table->string('ukom_nama')->nullable();
            $table->string('ukom_kode')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ukom');
    }
}
