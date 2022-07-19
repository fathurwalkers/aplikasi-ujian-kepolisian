<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\UkomController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/login-admin', [BackController::class, 'login_admin'])->name('login-admin');
Route::get('/login-client', [BackController::class, 'login_client'])->name('login-client');
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'client', 'middleware' => 'cekloginclient'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('client-index');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'cekloginadmin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
    Route::get('/bank-soal', [SoalController::class, 'bank_soal'])->name('bank-soal');

    // PESERTA
    Route::get('/data-peserta', [PesertaController::class, 'data_peserta'])->name('data-peserta');

    // PETUGAS
    Route::get('/data-petugas', [PetugasController::class, 'data_petugas'])->name('data-petugas');

    // UKOM
    Route::get('/data-ukom', [UkomController::class, 'data_ukom'])->name('data-ukom');
    Route::get('/post-tambah-ukom', [UkomController::class, 'post_tambah_ukom'])->name('post-tambah-ukom');

    // UKOM
    Route::get('/jadwal-ujian', [UjianController::class, 'jadwal_ujian'])->name('jadwal-ujian');
    Route::get('/hasil-ujian', [UjianController::class, 'hasil_ujian'])->name('hasil-ujian');
});
