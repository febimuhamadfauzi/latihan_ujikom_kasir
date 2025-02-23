<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentMethodController;

// Halaman Login dan Logout
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Mengarahkan / ke halaman login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
});

// Halaman Dashboard (hanya bisa diakses oleh pengguna yang sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin Routes (hanya admin yang bisa mengaksesnya)
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');

        // Rute ke halaman produk admin
        Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');

        // CRUD Produk - Admin
        Route::resource('admin/product', ProductController::class);

        // CRUD Metode Pembayaran - Admin SAJA
        Route::resource('admin/payment-methods', PaymentMethodController::class)
            ->names('admin.payment-methods');

        // ✅ CRUD Petugas - Hanya Admin yang bisa mengelola petugas
        Route::resource('admin/petugas', PetugasController::class)
            ->names('admin.petugas');  // Gunakan prefix admin.petugas
    });

    // Petugas Routes (hanya petugas yang bisa mengaksesnya)
    Route::middleware('role:petugas')->group(function () {
        Route::get('/petugas/dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
        Route::get('/petugas/transactions', [PetugasController::class, 'transactions'])->name('petugas.transactions');
    });

    // Pemilik Routes (hanya pemilik yang bisa mengaksesnya)
    Route::middleware('role:pemilik')->group(function () {
        Route::get('/pemilik/dashboard', [PemilikController::class, 'dashboard'])->name('pemilik.dashboard');
        Route::get('/pemilik/reports', [PemilikController::class, 'reports'])->name('pemilik.reports');
    });
});
