<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\UkomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::get('/login-android', function () {
    return view('login-android');
});
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::get('/login-admin', [BackController::class, 'login_admin'])->name('login-admin');
Route::get('/login-client', [BackController::class, 'login_client'])->name('login-client');
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/post-register', [BackController::class, 'post_register'])->name('post-register');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'client', 'middleware' => 'cekloginclient'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('client-index');
    Route::get('/client-profile', [ClientController::class, 'client_profile'])->name('client-profile');
    Route::post('/client-edit-profile', [ClientController::class, 'client_edit_profile'])->name('client-edit-profile');

    // Route Halaman Utama Dashboard Client [ Client.Index ]
    Route::get('/', [ClientController::class, 'index'])->name('client-index');

    // Route Pilih UKOM [ Client.Index > Mulai Ujian > Pilih Ukom ]
    Route::get('/hasil-ujian', [ClientController::class, 'client_daftar_hasil_ujian'])->name('client-daftar-hasil-ujian');
    Route::post('/client-proses-ujian-kecermatan', [ClientController::class, 'client_proses_ujian_kecermatan'])->name('client-proses-ujian-kecermatan');

    // Route Daftar Hasil Ujian [ Client.Index > Hasil Ukom ]
    Route::get('/pilih-ukom', [ClientController::class, 'client_pilih_ukom'])->name('client-pilih-ukom');

    // Route KONFIRMASI TOKEN UJIAN [ Client.Index > Mulai Ujian > Pilih Ukom > Konfirmasi Token Ujian ]
    Route::get('/konfirmasi-token-ujian/{id}', [ClientController::class, 'client_konfirmasi_token_ujian'])->name('client-konfirmasi-token-ujian');
    Route::post('/post-konfirmasi-token-ujian/{id}', [ClientController::class, 'client_post_konfirmasi_token_ujian'])->name('client-post-konfirmasi-token-ujian');

    // Route UJIAN REGULER
    Route::get('/ujian-reguler/{id}', [ClientController::class, 'client_ujian_reguler'])->name('client-ujian-reguler');
    Route::get('/ujian-kecermatan/{id}', [ClientController::class, 'client_ujian_kecermatan'])->name('client-ujian-kecermatan');
    Route::post('/post-cek-ujian/{id}', [ClientController::class, 'client_post_cek_ujian'])->name('client-post-cek-ujian');
    Route::get('/proses-hasil-ujian/{ukomid}/{dataid}', [ClientController::class, 'client_proses_hasil_ujian'])->name('client-proses-hasil-ujian');
    Route::get('/proses-hasil-ujian-kecermatan/{ukomid}/{dataid}', [ClientController::class, 'client_proses_hasil_ujian_kecermatan'])->name('client-proses-hasil-ujian-kecermatan');
    Route::get('/hasil-ujian/{ukomid}/{dataid}', [ClientController::class, 'client_hasil_ujian'])->name('client-hasil-ujian');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'cekloginadmin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
    Route::get('/profile', [BackController::class, 'profile'])->name('profile');
    Route::post('/edit-profile', [BackController::class, 'edit_profile'])->name('edit-profile');

    // SOAL
    Route::get('/bank-soal', [SoalController::class, 'bank_soal'])->name('bank-soal');
    Route::get('/lihat-soal/{ukom_id}', [SoalController::class, 'lihat_soal'])->name('lihat-soal');
    Route::post('/bank-soal/tambah-soal/reguler', [SoalController::class, 'post_tambah_soal_reguler'])->name('post-tambah-soal-reguler');
    Route::post('/bank-soal/tambah-soal/campur', [SoalController::class, 'post_tambah_soal_campur'])->name('post-tambah-soal-campur');
    Route::post('/bank-soal/tambah-soal/kecermatan', [SoalController::class, 'post_tambah_soal_kecermatan'])->name('post-tambah-soal-kecermatan');

    // AKUN
    Route::get('/data-akun', [BackController::class, 'data_akun'])->name('data-akun');
    Route::post('/hapus-akun', [BackController::class, 'hapus_akun'])->name('hapus-akun');

    // PESERTA
    Route::get('/data-peserta', [PesertaController::class, 'data_peserta'])->name('data-peserta');
    Route::post('/hapus-peserta', [PesertaController::class, 'hapus_peserta'])->name('hapus-peserta');

    // PETUGAS
    Route::get('/data-petugas', [PetugasController::class, 'data_petugas'])->name('data-petugas');
    Route::post('/hapus-petugas', [PetugasController::class, 'hapus_petugas'])->name('hapus-petugas');

    // UKOM
    Route::get('/data-ukom', [UkomController::class, 'data_ukom'])->name('data-ukom');
    Route::post('/post-tambah-ukom', [UkomController::class, 'post_tambah_ukom'])->name('post-tambah-ukom');
    Route::post('/hapus-ukom/{id}', [UkomController::class, 'hapus_ukom'])->name('hapus-ukom');
    Route::post('/update-ukom/{id}', [UkomController::class, 'update_ukom'])->name('update-ukom');

    // UJIAN
    Route::get('/jadwal-ujian', [UjianController::class, 'jadwal_ujian'])->name('jadwal-ujian');
    Route::get('/hasil-ujian', [UjianController::class, 'hasil_ujian'])->name('hasil-ujian');
    Route::post('/hapus-ujian/{id}', [UjianController::class, 'hapus_ujian'])->name('hapus-ujian');
    Route::post('/post-tambah-ujian', [UjianController::class, 'post_tambah_ujian'])->name('post-tambah-ujian');
});

// GENERATE DATA
Route::get('/generate-default-pengguna', [GenerateController::class, 'generate_default_pengguna'])->name('generate-default-pengguna');
Route::get('/generate-pengguna', [GenerateController::class, 'generate_pengguna'])->name('generate-pengguna');
Route::get('/generate-petugas', [GenerateController::class, 'generate_petugas'])->name('generate-petugas');
Route::get('/generate-soal', [GenerateController::class, 'generate_soal'])->name('generate-soal');
Route::get('/generate-ujian', [GenerateController::class, 'generate_ujian'])->name('generate-ujian');
Route::get('/generate-chained', [GenerateController::class, 'chained_generate'])->name('generate-chained');
