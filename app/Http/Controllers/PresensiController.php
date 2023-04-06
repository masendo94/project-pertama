<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    //

    public function index()
    {
        // echo 'kd';
        return view('presensi.index');
    }
}
