<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;

class WheelController extends Controller
{
    public function index(Request $request)
    {
        return view('wheeldecide.wheel-index');
    }

    public function proses_nama_polling(Request $request)
    {
        $check_session = session('nama');
        if ($check_session !== null) {
            $request->session()->forget(['nama']);
            $request->session()->flush();
        }
        $request_nama = $request->nama;
        if ($request_nama[0] === null) {
            return redirect()->route('wheel');
        }
        $nama = array();
        foreach ($request_nama as $rq) {
            if ($rq !== null) {
                $nama = Arr::prepend($nama, $rq);
            }
        }
        $session_nama = session(['nama' => $nama]);
        return redirect()->route('spin');
    }

    public function spin(Request $request)
    {
        $check_session = session('nama');
        $nama = $check_session;
        $count_nama = count($nama);

        $array_color = [
            "#fed136",
            "#5BBF42",
            "#41CEDB",
            "#e7706f",
            "#8787F2",
            "#4381C1",
            "#BEA2C2",
            "#A37871",
            "#4E4B5C",
            "#DD1313",
            "orange",
            "yellow",
            "green",
            "blue",
            "indigo",
            "violet",
        ];

        return view('wheeldecide.wheel-spin', [
            'nama' => $nama,
            'count_nama' => $count_nama,
            'array_color' => $array_color,
        ]);
    }
}
