<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Riwayathasilujian;

class ProsesSoalReguler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $data_handle = $this->data;
        $riwayat_hasil = new Riwayathasilujian;
        $save_riwayat_hasil = $riwayat_hasil->create([
            'riwayat_jawaban_peserta' => $data_handle["jawaban_peserta"],
            'riwayat_jawaban_soal' => $data_handle["jawaban_benar"],
            'riwayat_bobot_nilai' => $data_handle["jawaban_bobot_nilai"],
            'data_id' => intval($data_handle["data_id"]),
            'soal_id' => intval($data_handle["soal_id"]),
            'ukom_id' => intval($data_handle["ukom_id"]),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_riwayat_hasil->save();
    }
}
