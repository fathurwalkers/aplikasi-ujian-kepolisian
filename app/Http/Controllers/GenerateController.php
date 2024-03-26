<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use App\Models\Ukom;
use App\Models\Soal;
use App\Models\Ujian;

class GenerateController extends Controller
{
    public function generate_pengguna()
    {
        $faker = Faker::create('id_ID');

        $jenis_kelamin = ["L", "P"];

        for ($i=0; $i < 20; $i++) {
            // DATA
            $data_nama = $faker->name();
            $data_telepon = $faker->phoneNumber();
            $data_jeniskelamin = Arr::random($jenis_kelamin);
            $data_kode = strtoupper(Str::random(8));

            // LOGIN
            $login_model            = new Login;
            $password               = '12345';
            $hashPassword           = Hash::make($password, [
                'rounds' => 12,
            ]);
            $token_raw              = Str::random(16);
            $token                  = Hash::make($token_raw, [
                'rounds' => 12,
            ]);
            $level                  = "user";
            $login_status           = "verified";
            $random_email           = "mail" . strtolower(Str::random(5)) . "@gmail.com";
            $login_data = $login_model->create([
                'login_nama'        => $data_nama,
                'login_username'    => 'user' . $i . strtolower(Str::random(5)),
                'login_password'    => $hashPassword,
                'login_email'       => $random_email,
                'login_telepon'     => $data_telepon,
                'login_token'       => $token,
                'login_level'       => $level,
                'login_status'      => $login_status,
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $login_data->save();

            $data = new Data;
            $save_data = $data->create([
                "data_nama" => $data_nama,
                "data_telepon" => $data_telepon,
                "data_jeniskelamin" => $data_jeniskelamin,
                "data_kode" => $data_kode,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $save_data->save();
            $save_data->login()->associate($login_data->id);
            $save_data->save();
        }
    }

    public function generate_default_pengguna()
    {
        $faker = Faker::create('id_ID');

        $jenis_kelamin = ["L", "P"];

        // DATA
        $data_nama = $faker->name();
        $data_telepon = $faker->phoneNumber();
        $data_jeniskelamin = Arr::random($jenis_kelamin);
        $data_kode = strtoupper(Str::random(8));

        // LOGIN
        $login_model            = new Login;
        $password               = '12345';
        $hashPassword           = Hash::make($password, [
            'rounds' => 12,
        ]);
        $token_raw              = Str::random(16);
        $token                  = Hash::make($token_raw, [
            'rounds' => 12,
        ]);
        $level                  = "user";
        $login_status           = "verified";
        $random_email           = "mail" . strtolower(Str::random(5)) . "@gmail.com";
        $login_data = $login_model->create([
            'login_nama'        => $data_nama,
            'login_username'    => "example",
            'login_password'    => $hashPassword,
            'login_email'       => $random_email,
            'login_telepon'     => $data_telepon,
            'login_token'       => $token,
            'login_level'       => $level,
            'login_status'      => $login_status,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
        $login_data->save();

        $data = new Data;
        $save_data = $data->create([
            "data_nama" => $data_nama,
            "data_telepon" => $data_telepon,
            "data_jeniskelamin" => $data_jeniskelamin,
            "data_kode" => $data_kode,
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $save_data->save();
        $save_data->login()->associate($login_data->id);
        $save_data->save();
    }

    public function generate_petugas()
    {
        $faker = Faker::create('id_ID');

        $jenis_kelamin = ["L", "P"];

        for ($i=0; $i < 20; $i++) {
            // DATA
            $data_nama = $faker->name();
            $data_telepon = $faker->phoneNumber();
            $data_jeniskelamin = Arr::random($jenis_kelamin);
            $data_kode = strtoupper(Str::random(8));

            // LOGIN
            $login_model            = new Login;
            $password               = '12345';
            $hashPassword           = Hash::make($password, [
                'rounds' => 12,
            ]);
            $token_raw              = Str::random(16);
            $token                  = Hash::make($token_raw, [
                'rounds' => 12,
            ]);
            $level                  = "petugas";
            $login_status           = "verified";
            $random_email           = "mail" . strtolower(Str::random(5)) . "@gmail.com";
            $login_data = $login_model->create([
                'login_nama'        => $data_nama,
                'login_username'    => 'petugas' . $i . strtolower(Str::random(5)),
                'login_password'    => $hashPassword,
                'login_email'       => $random_email,
                'login_telepon'     => $data_telepon,
                'login_token'       => $token,
                'login_level'       => $level,
                'login_status'      => $login_status,
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $login_data->save();

            $data = new Data;
            $save_data = $data->create([
                "data_nama" => $data_nama,
                "data_telepon" => $data_telepon,
                "data_jeniskelamin" => $data_jeniskelamin,
                "data_kode" => $data_kode,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $save_data->save();
            $save_data->login()->associate($login_data->id);
            $save_data->save();
        }
    }

    public function generate_soal()
    {
        $faker = Faker::create('id_ID');

        $ukom_reguler = Ukom::where('ukom_kategori', "reguler")->get()->toArray();
        foreach ($ukom_reguler as $item) {

            // SOAL BIASA
            for ($i=0; $i < 10; $i++) {
                $soal = new Soal;
                $soal_kategori = "regular";
                $soal_kode = strtoupper(Str::random(10));
                $array_jawaban = ["A", "B", "C", "D", "E"];
                $random_jawaban = Arr::random($array_jawaban);

                $array_paragraph = [2, 3, 4, 5, 6];
                $array_word = [8, 9, 10, 11, 12, 13, 14, 15, 16];

                $random_paragraph = Arr::random($array_paragraph);
                $random_word = Arr::random($array_word);

                $save_soal = $soal->create([
                    "soal_kategori" => $soal_kategori,
                    "soal_kode" => $soal_kode,
                    "soal_isi" => $faker->paragraph($random_paragraph, false),
                    "soal_isi_gambar" => NULL,
                    "soal_opsi_a" => $faker->words($random_word, true),
                    "soal_opsi_b" => $faker->words($random_word, true),
                    "soal_opsi_c" => $faker->words($random_word, true),
                    "soal_opsi_d" => $faker->words($random_word, true),
                    "soal_opsi_e" => $faker->words($random_word, true),
                    "soal_opsi_gambar_a" => NULL,
                    "soal_opsi_gambar_b" => NULL,
                    "soal_opsi_gambar_c" => NULL,
                    "soal_opsi_gambar_d" => NULL,
                    "soal_opsi_gambar_e" => NULL,
                    "soal_jawaban" => $random_jawaban,
                    "soal_bobot_nilai" => 1,
                    "ukom_id" => $item["id"],
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
                $save_soal->save();
            }
        }

        $ukom_kecermatan = Ukom::where('ukom_kategori', "kecermatan")->get()->toArray();
        foreach ($ukom_kecermatan as $item2) {
            // SOAL KECERMATAN
            $raw_soal = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $split_raw_soal = str_split($raw_soal);
            $take_five_random_soal = Arr::random($split_raw_soal, 5);
            $isi_soal = implode($take_five_random_soal);

            for ($i=0; $i < 60; $i++) {

                $soal_original = str_split($isi_soal);
                $soal_jawaban = Arr::random($soal_original);
                $real_soal = Str::remove($soal_jawaban, $isi_soal);
                $array_soal = Arr::shuffle(str_split($isi_soal));

                $split_real_soal = str_split($real_soal);
                $shuffle_real_soal1 = Arr::shuffle($split_real_soal);
                $shuffle_real_soal2 = Arr::shuffle($shuffle_real_soal1);
                $shuffle_real_soal3 = Arr::shuffle($shuffle_real_soal2);
                $shuffle_real_soal4 = Arr::shuffle($shuffle_real_soal3);
                $soal_isi = implode($shuffle_real_soal4);

                $soal = new Soal;
                $soal_kategori = "kecermatan";
                $soal_kode = strtoupper(Str::random(10));

                $array_word = [8, 9, 10, 11, 12, 13, 14, 15, 16];

                $random_word = Arr::random($array_word);

                $save_soal = $soal->create([
                    "soal_kecermatan_original_isi" => $isi_soal,
                    "soal_kategori" => $soal_kategori,
                    "soal_kode" => $soal_kode,
                    "soal_isi" => strtoupper($soal_isi),
                    "soal_isi_gambar" => NULL,
                    "soal_opsi_a" => $soal_original[0],
                    "soal_opsi_b" => $soal_original[1],
                    "soal_opsi_c" => $soal_original[2],
                    "soal_opsi_d" => $soal_original[3],
                    "soal_opsi_e" => $soal_original[4],
                    "soal_opsi_gambar_a" => NULL,
                    "soal_opsi_gambar_b" => NULL,
                    "soal_opsi_gambar_c" => NULL,
                    "soal_opsi_gambar_d" => NULL,
                    "soal_opsi_gambar_e" => NULL,
                    "soal_jawaban" => $soal_jawaban,
                    "soal_bobot_nilai" => 1,
                    "ukom_id" => $item2["id"],
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
                $save_soal->save();
            }
        }
        // return redirect()->route('bank-soal')->with('status', 'Berhasil Melakukan Generate Soal.');
    }

    public function generate_ujian()
    {
        $faker = Faker::create('id_ID');
        $ukom = Ukom::all();
        foreach ($ukom as $item) {
            $ujian = new Ujian;
            $soal = Soal::where('ukom_id', $item->id)->count();
            $array_menit = [30, 60, 120, 180, 260];
            $save_ujian = $ujian->create([
                "ujian_nama" => "Uji Kompetensi - " . $item->ukom_nama,
                "ujian_menit" => Arr::random($array_menit),
                "ujian_jumlah_soal" => $soal,
                "ujian_tanggal_dibuat" => now(),
                "ujian_token" => strtolower(Str::random(5)),
                "ujian_status" => "AKTIF",
                "ukom_id" => $item->id,
                "created_at" => now(),
                "updated_at" => now(),
            ]);
            $save_ujian->save();
        }
        $ujian_all = Ujian::all();
    }

    public function chained_generate()
    {
        $this->generate_default_pengguna();
        $this->generate_pengguna();
        $this->generate_soal();
        $this->generate_ujian();
        return redirect()->route('dashboard')->with('status', 'Berhasil melakukan Generate semua data.');
    }
}
