<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Ukom;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class SoalController extends Controller
{
    public function bank_soal()
    {
        $ukom = Ukom::all();
        return view('dashboard.bank-soal', [
            'ukom' => $ukom,
        ]);
    }

    public function lihat_soal($ukom_id)
    {
        $id_ukom = $ukom_id;
        $ukom = Ukom::find($id_ukom);
        $soal = Soal::where('ukom_id', $ukom->id)->get();
        $count_soal = $soal->count();
        return view('soal.lihat-soal', [
            'ukom' => $ukom,
            'soal' => $soal,
            'count_soal' => $count_soal,
        ]);
    }

    public function post_tambah_soal_campur(Request $request)
    {
        $ukom_id = $request->ukom_id;
        $ukom = Ukom::find($ukom_id);

        $soal_jawaban = $request->soal_jawaban;
        $soal_isi = $request->soal_isi;
        $soal_opsi_a = $request->soal_opsi_a;
        $soal_opsi_b = $request->soal_opsi_b;
        $soal_opsi_c = $request->soal_opsi_c;
        $soal_opsi_d = $request->soal_opsi_d;
        $soal_opsi_e = $request->soal_opsi_e;

        dump($soal_opsi_a);
        dump($soal_opsi_b);
        dump($soal_opsi_c);
        dump($soal_opsi_d);
        dump($soal_opsi_e);
        // die; 

        $soal_gambar_a_cek = $request->file('soal_gambar_a');
        if (!$soal_gambar_a_cek) {
            $randomNamaGambar_a = null;
        } else {
            $randomNamaGambar_a = Str::random(10) . '.jpg';
            $soal_gambar_a = $request->file('soal_gambar_a')->move(public_path('foto'), strtolower($randomNamaGambar_a));
        }

        $soal_gambar_b_cek = $request->file('soal_gambar_b');
        if (!$soal_gambar_b_cek) {
            $randomNamaGambar_b = null;
        } else {
            $randomNamaGambar_b = Str::random(10) . '.jpg';
            $soal_gambar_b = $request->file('soal_gambar_b')->move(public_path('foto'), strtolower($randomNamaGambar_b));
        }

        $soal_gambar_c_cek = $request->file('soal_gambar_c');
        if (!$soal_gambar_c_cek) {
            $randomNamaGambar_c = null;
        } else {
            $randomNamaGambar_c = Str::random(10) . '.jpg';
            $soal_gambar_c = $request->file('soal_gambar_c')->move(public_path('foto'), strtolower($randomNamaGambar_c));
        }

        $soal_gambar_d_cek = $request->file('soal_gambar_d');
        if (!$soal_gambar_d_cek) {
            $randomNamaGambar_d = null;
        } else {
            $randomNamaGambar_d = Str::random(10) . '.jpg';
            $soal_gambar_d = $request->file('soal_gambar_d')->move(public_path('foto'), strtolower($randomNamaGambar_d));
        }

        $soal_gambar_e_cek = $request->file('soal_gambar_e');
        if (!$soal_gambar_e_cek) {
            $randomNamaGambar_e = null;
        } else {
            $randomNamaGambar_e = Str::random(10) . '.jpg';
            $soal_gambar_e = $request->file('soal_gambar_e')->move(public_path('foto'), strtolower($randomNamaGambar_e));
        }
        // dump($soal_gambar_a);
        // dump($soal_gambar_b);
        // dump($soal_gambar_c);
        // dump($soal_gambar_d);
        // dump($soal_gambar_e);
        // die; 
        $soal = new Soal;
        $soal_kategori = $ukom->ukom_kategori;
        $soal_kode = strtoupper(Str::random(10));
        $save_soal = $soal->create([
            "soal_kategori" => $soal_kategori,
            "soal_kode" => $soal_kode,
            "soal_isi" => $soal_isi,
            "soal_isi_gambar" => null,
            "soal_opsi_a" => strtoupper($soal_opsi_a),
            "soal_opsi_b" => strtoupper($soal_opsi_b),
            "soal_opsi_c" => strtoupper($soal_opsi_c),
            "soal_opsi_d" => strtoupper($soal_opsi_d),
            "soal_opsi_e" => strtoupper($soal_opsi_e),
            "soal_opsi_gambar_a" => $randomNamaGambar_a,
            "soal_opsi_gambar_b" => $randomNamaGambar_b,
            "soal_opsi_gambar_c" => $randomNamaGambar_c,
            "soal_opsi_gambar_d" => $randomNamaGambar_d,
            "soal_opsi_gambar_e" => $randomNamaGambar_e,
            "soal_jawaban" => strtoupper($soal_jawaban),
            "soal_bobot_nilai" => 10,
            "ukom_id" => $ukom->id,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        $save_soal->save();
        if ($save_soal == true) {
            return redirect()->route('lihat-soal', $ukom_id)->with('status', 'Berhasil menambahkan Data Bank Soal baru untuk Uji Kompetensi Tipe REGULER.');
        } else {
            return redirect()->route('lihat-soal', $ukom_id)->with('status', 'Terjadi kesalahan, soal tidak dapat ditambahkan.');
        }
    }

    public function post_tambah_soal_reguler(Request $request)
    {
        $ukom_id = $request->ukom_id;
        $ukom = Ukom::find($ukom_id);

        $soal_jawaban = $request->soal_jawaban;
        $soal_isi = $request->soal_isi;
        $soal_opsi_a = $request->soal_opsi_a;
        $soal_opsi_b = $request->soal_opsi_b;
        $soal_opsi_c = $request->soal_opsi_c;
        $soal_opsi_d = $request->soal_opsi_d;
        $soal_opsi_e = $request->soal_opsi_e;
        $soal = new Soal;
        $soal_kategori = $ukom->ukom_kategori;
        $soal_kode = strtoupper(Str::random(10));
        $save_soal = $soal->create([
            "soal_kategori" => $soal_kategori,
            "soal_kode" => $soal_kode,
            "soal_isi" => $soal_isi,
            "soal_isi_gambar" => null,
            "soal_opsi_a" => strtoupper($soal_opsi_a),
            "soal_opsi_b" => strtoupper($soal_opsi_b),
            "soal_opsi_c" => strtoupper($soal_opsi_c),
            "soal_opsi_d" => strtoupper($soal_opsi_d),
            "soal_opsi_e" => strtoupper($soal_opsi_e),
            // "soal_opsi_e" => NULL,
            "soal_opsi_gambar_a" => null,
            "soal_opsi_gambar_b" => null,
            "soal_opsi_gambar_c" => null,
            "soal_opsi_gambar_d" => null,
            "soal_opsi_gambar_e" => null,
            "soal_jawaban" => strtoupper($soal_jawaban),
            "soal_bobot_nilai" => 10,
            "ukom_id" => $ukom->id,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        $save_soal->save();
        if ($save_soal == true) {
            return redirect()->route('lihat-soal', $ukom_id)->with('status', 'Berhasil menambahkan Data Bank Soal baru untuk Uji Kompetensi Tipe REGULER.');
        } else {
            return redirect()->route('lihat-soal', $ukom_id)->with('status', 'Terjadi kesalahan, soal tidak dapat ditambahkan.');
        }
    }

    public function post_tambah_soal_kecermatan(Request $request)
    {
        $ukom_id = $request->ukom_id;
        $ukom = Ukom::find($ukom_id);
        // CEK JUMLAH SOAL
        $soal = Soal::where('ukom_id', $ukom->id)->get();
        if ($soal->count() == 600) {
            return redirect()->route('lihat-soal', $ukom_id)->with('status', 'Maaf, soal hanya bisa dibuat sampai dengan 10 kolom');
            die;
        }
        $take_five_random_soal = strval($request->soal_kecermatan_original_isi);

        for ($i = 0; $i < 60; $i++) {
            $soal_original = mb_str_split($take_five_random_soal);
            $soal_jawaban = Arr::random($soal_original);
            $real_soal = Str::remove($soal_jawaban, $take_five_random_soal);
            $array_soal = Arr::shuffle(mb_str_split($take_five_random_soal));

            // Fungsi untuk Acak Soal
            $split_real_soal = mb_str_split($real_soal);
            $shuffle_real_soal1 = Arr::shuffle($split_real_soal);
            $shuffle_real_soal2 = Arr::shuffle($shuffle_real_soal1);
            $shuffle_real_soal3 = Arr::shuffle($shuffle_real_soal2);
            $shuffle_real_soal4 = Arr::shuffle($shuffle_real_soal3);
            $soal_isi = implode($shuffle_real_soal4);

            $soal = new Soal;
            $soal_kategori = "kecermatan";
            $soal_kode = strtoupper(Str::random(10));
            $save_soal = $soal->create([
                // "soal_kecermatan_original_isi" => strtoupper($take_five_random_soal),
                "soal_kecermatan_original_isi" => $take_five_random_soal,
                "soal_kategori" => $soal_kategori,
                "soal_kode" => $soal_kode,
                // Fungsi untuk Acak Soal
                // "soal_isi" => strtoupper($soal_isi),
                "soal_isi" => $soal_isi,
                // "soal_isi" => strtoupper($real_soal),
                "soal_isi_gambar" => null,
                "soal_opsi_a" => $soal_original[0],
                "soal_opsi_b" => $soal_original[1],
                "soal_opsi_c" => $soal_original[2],
                "soal_opsi_d" => $soal_original[3],
                "soal_opsi_e" => $soal_original[4],
                "soal_opsi_gambar_a" => null,
                "soal_opsi_gambar_b" => null,
                "soal_opsi_gambar_c" => null,
                "soal_opsi_gambar_d" => null,
                "soal_opsi_gambar_e" => null,
                // "soal_jawaban" => strtoupper($soal_jawaban),
                "soal_jawaban" => $soal_jawaban,
                "soal_bobot_nilai" => 10,
                "ukom_id" => $ukom->id,
                "created_at" => now(),
                "updated_at" => now(),
            ]);
            $save_soal->save();
        }
        return redirect()->route('lihat-soal', $ukom_id)->with('status', 'Berhasil menambahkan Data Bank Soal baru untuk Uji Kompetensi Tipe KECERMATAN.');
    }
}
