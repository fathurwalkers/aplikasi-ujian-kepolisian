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

class PesertaController extends Controller
{
    public function data_peserta()
    {
        $pengguna = Data::all();
        return view('peserta.data-peserta', [
            'pengguna' => $pengguna
        ]);
    }

    public function hapus_peserta(Request $request)
    {
        $peserta_id = $request->hapus_id;
        $peserta = Data::find($peserta_id);
        $login = Login::find($peserta->login_id);
        $alert = "Berhasil menghapus Data peserta : " . $peserta->data_nama;
        $login->forceDelete();
        return redirect()->route('data-peserta')->with('status', $alert);
    }
}
