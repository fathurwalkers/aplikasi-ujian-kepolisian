<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Ukom;
use App\Models\Data;
use App\Models\Hasil;
use App\Models\Soal;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'FathurWalkers',
            'login_username' => 'fathurwalkers',
            'login_password' => $hashPassword,
            'login_email' => 'fathurwalkers44@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);


        // ADMIN 1
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('admin', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Administrator',
            'login_username' => 'admin',
            'login_password' => $hashPassword,
            'login_email' => 'administrator@gmail.com',
            'login_telepon' => '083400592841',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ---------------------------------------------------------------------------

        // petugas
        $token = Str::random(16);
        $role = "petugas";
        $hashPassword = Hash::make('petugas', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'petugas 1',
            'login_username' => 'petugas',
            'login_password' => $hashPassword,
            'login_email' => 'petugas@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Pertama
        $token = Str::random(16);
        $role = "pengguna";
        $hashPassword = Hash::make('user1', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 1',
            'login_username' => 'user1',
            'login_password' => $hashPassword,
            'login_email' => 'user1@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Kedua
        $token = Str::random(16);
        $role = "pengguna";
        $hashPassword = Hash::make('user2', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 2',
            'login_username' => 'user2',
            'login_password' => $hashPassword,
            'login_email' => 'user2@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);


        // ----------------------------------------------------------------------------
        // GENERATE DATA UKOM

        $array_kategori_ukom = ["reguler", "kecermatan"];
        $array_ukom_nama = [
            "Test Dasar Kepemimpinan",
            "Test Dasar Matematika",
            "Test Dasar Bahasa Indonesia",
            "Test Tingkat Lanjut Matematika",
            "Test Tingkat Lanjut Bahasa Indonesia",
            "Test Tingkat Lanjut Bahasa Inggris",
            "Test Tingkat Lanjut Perilaku",
        ];
        foreach ($array_ukom_nama as $ukom_nama) {
            $ukom = new Ukom;
            $ukom_kategori = Arr::random($array_kategori_ukom);
            $ukom_kode = "UKOM" . strtoupper(Str::random(10));
            $save_ukom = $ukom->create([
                'ukom_kategori' => $ukom_kategori,
                'ukom_nama' => $ukom_nama,
                'ukom_kode' => $ukom_kode,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_ukom->save();
        }

        // ----------------------------------------------------------------------------
    }
}
