<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    // Hanya bisa diakses oleh petugas
    public function dashboard()
    {
        return view('petugas.dashboard');
    }

    public function transactions()
    {
        return view('petugas.transactions');
    }
}
