<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah pengguna ada dan password cocok
        if ($user && password_verify($request->password, $user->password)) {
            Auth::login($user);

            // Periksa role pengguna dan arahkan ke dashboard yang sesuai
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'petugas') {
                return redirect()->route('petugas.dashboard');
            } elseif ($user->role == 'pemilik') {
                return redirect()->route('pemilik.dashboard');
            } else {
                return redirect()->route('login')->withErrors(['email' => 'Role tidak ditemukan.']);
            }
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
