<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Ukom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UkomController extends Controller
{
    public function data_ukom()
    {
        $ukom = Ukom::all();
        return view('ukom.data-ukom', [
            'ukom' => $ukom,
        ]);
    }

    public function hapus_ukom(Request $request, $id)
    {
        $ukom_id = $id;
        $getdelete = Ukom::findOrFail($ukom_id);
        $getdelete->forceDelete();
        return redirect()->route('data-ukom')->with('status', 'Data UKOM telah dihapus.');
    }

    public function update_ukom(Request $request, $id)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        if ($users->login_level !== 'admin') {
            return redirect()->route('data-ukom')->with('status', 'Maaf, anda tidak memiliki akses untuk melakukan aksi ini!');
        } else {
            $ukom = Ukom::find($id);
            if ($ukom == null) {
                return redirect()->route('data-ukom')->with('status', 'Maaf, Data yang anda ingin kelola tidak tersedia.');
            } else {
                $ukom_nama = $request->ukom_nama;
                $ukom->update([
                    'ukom_nama' => $ukom_nama,
                    'updated_at' => now(),
                ]);
                return redirect()->route('data-ukom')->with('status', 'Data UKOM Telah berhasil diubah.');
            }
        }
    }

    public function post_tambah_ukom(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        if ($users->login_level !== 'admin') {
            return redirect()->route('data-ukom')->with('status', 'Maaf, anda tidak memiliki akses untuk melakukan aksi ini!');
        } else {
            $ukom = new Ukom;
            $ukom_nama = $request->ukom_nama;
            $ukom_kategori = $request->ukom_kategori;
            $ukom_kode = "UKOM" . strtoupper(Str::random(10));
            $save_ukom = $ukom->create([
                'ukom_kategori' => $ukom_kategori,
                'ukom_nama' => $ukom_nama,
                'ukom_kode' => $ukom_kode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $save_ukom->save();
            if ($save_ukom !== null) {
                return redirect()->route('data-ukom')->with('status', 'Penambahan data ukom berhasil!');
            } else {
                return redirect()->route('data-ukom')->with('status', 'Penambahan data ukom gagal!');
            }
        }
    }
}
