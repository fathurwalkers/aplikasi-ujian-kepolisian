<?php

namespace App\Http\Controllers;

use App\Jobs\PerhitunganNilaiSoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use App\Models\Hasil;
use App\Models\Ukom;
use App\Models\Soal;
use App\Models\Ujian;

class UjianController extends Controller
{
    public function jadwal_ujian()
    {
        $ujian = Ujian::all();
        $ukom = Ukom::all();
        return view('ujian.jadwal-ujian', [
            'ujian' => $ujian,
            'ukom' => $ukom,
        ]);
    }

    public function post_tambah_ujian(Request $request)
    {
        $ujian_nama = $request->ujian_nama;
        $ujian_menit = intval($request->ujian_menit);
        $ukom_id = $request->ukom_id;
        $ukom = Ukom::find($ukom_id);
        $soal = Soal::where('ukom_id', $ukom->id)->get();

        $ujian = new Ujian;

        $soal_count = $soal->count();
        $ujian_token = strtolower(Str::random(5));
        $save_ujian = $ujian->create([
            'ujian_nama' => $ujian_nama,
            'ujian_menit' => $ujian_menit,
            'ujian_jumlah_soal' => $soal_count,
            'ujian_tanggal_dibuat' => now(),
            'ujian_token' => $ujian_token,
            'ujian_status' => "AKTIF",
            'ukom_id' => $ukom->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_ujian->save();
        return redirect()->route('jadwal-ujian')->with('status', 'Data Ujian Baru berhasil ditambahkan.');
    }

    public function calculateScore($jumlahJawabanBenar, $jumlahJawabanSalah, $bobotNilaiBenar, $totalSoal)
    {
        // Hitung skor yang diperoleh berdasarkan jawaban benar dan salah
        $skorDiperoleh = ($jumlahJawabanBenar * $bobotNilaiBenar) - ($jumlahJawabanSalah * 0);

        // Hitung total skor maksimum yang bisa didapatkan
        $totalSkorMaksimum = $totalSoal * $bobotNilaiBenar;

        // Hitung persentase skor yang diperoleh dari total skor maksimum
        $persentaseSkor = ($skorDiperoleh / $totalSkorMaksimum) * 100;

        return $persentaseSkor;
    }

    public function hasil_ujian()
    {
        $ujian = Ujian::all();
        $hasil = Hasil::all();
        return view('ujian.hasil-ujian', [
            'hasil' => $hasil,
            'ujian' => $ujian,
        ]);
    }

    public function hapus_ujian(Request $request, $id)
    {
        $ujian = $id;
        $getdelete = Ujian::find($ujian);
        // dd($getdelete);
        $getdelete->forceDelete();
        return redirect()->route('jadwal-ujian')->with('status', 'Data Hasil telah dihapus.');
    }

}
