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

class UjianController extends Controller
{
    public function jadwal_ujian()
    {
        return view('ujian.jadwal-ujian');
    }

    public function hasil_ujian()
    {
        return view('ujian.hasil-ujian');
    }
}
