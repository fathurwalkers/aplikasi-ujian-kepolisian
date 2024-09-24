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

class PetugasController extends Controller
{
    public function data_petugas()
    {
        $petugas = Data::all();
        return view('petugas.data-petugas', [
            'petugas' => $petugas
        ]);
    }

    public function hapus_petugas(Request $request)
    {
        $petugas_id = $request->hapus_id;
        $petugas = Data::find($petugas_id);
        $login = Login::find($petugas->login_id);
        $alert = "Berhasil menghapus Data Petugas : " . $petugas->data_nama;
        $login->forceDelete();
        return redirect()->route('data-petugas')->with('status', $alert);
    }
}
