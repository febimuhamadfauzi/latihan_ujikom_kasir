<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemilikController extends Controller
{
    // Hanya bisa diakses oleh pemilik
    public function dashboard()
    {
        return view('pemilik.dashboard');
    }

    public function reports()
    {
        return view('pemilik.reports');
    }
}
