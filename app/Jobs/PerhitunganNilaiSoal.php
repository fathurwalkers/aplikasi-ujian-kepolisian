<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Soal;
use App\Models\Ukom;
use App\Models\Hasil;

class PerhitunganNilaiSoal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
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

    public function handle()
    {
        $data_handle = $this->data;
        // dd($data_handle);
        $hasil_skor = $this->calculateScore($data_handle["jumlah_jawaban_benar"], $data_handle["jumlah_jawaban_salah"], $data_handle["bobot_nilai_benar"], $data_handle["total_soal"]);
        // dd(intval($hasil_skor));
        return intval($hasil_skor);
    }
}
