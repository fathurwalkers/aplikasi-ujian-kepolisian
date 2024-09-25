<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WheelController extends Controller
{
    public function index()
    {
        return view('wheeldecide.wheel-index');
    }

    public function spin()
    {
        return view('wheeldecide.wheel-spin'); 
    }
}
