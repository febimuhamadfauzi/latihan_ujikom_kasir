<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function __construct()
    {
        // Memastikan hanya pengguna yang sudah login yang bisa mengakses controller ini
        $this->middleware('auth');
    }

    // Halaman Dashboard Petugas
    public function dashboard()
    {
        return view('petugas.dashboard');
    }

    // Halaman Transaksi Petugas
    public function transactions()
    {
        return view('petugas.transactions');
    }

    // Menampilkan daftar petugas dengan pagination
    public function index()
    {
        $petugas = Petugas::paginate(3); // Pagination 3 item per halaman
        return view('admin.petugas.index', compact('petugas'));
    }

    // Menampilkan form tambah petugas
    public function create()
    {
        return view('admin.petugas.create');
    }

    // Menyimpan data petugas baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email',
            'nomor_telepon' => 'required|string|max:15',
            'password' => 'required|min:6',
        ]);

        Petugas::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil ditambahkan!');
    }

    // Menampilkan form edit petugas
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    // Menyimpan perubahan data petugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email,' . $id, // Pastikan email unik kecuali untuk user yang sedang diedit
            'nomor_telepon' => 'required|string|max:15',
            'password' => 'nullable|min:6',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->nama = $request->nama;
        $petugas->email = $request->email;
        $petugas->nomor_telepon = $request->nomor_telepon;

        if ($request->filled('password')) { // Update password hanya jika diisi
            $petugas->password = Hash::make($request->password);
        }

        $petugas->save();

        $search = $request->input('search');

        $petugas = Petugas::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('nomor_telepon', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.petugas.index', compact('petugas', 'search'));

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil diperbarui!');
    }

    // Menghapus petugas
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil dihapus!');
    }
}
