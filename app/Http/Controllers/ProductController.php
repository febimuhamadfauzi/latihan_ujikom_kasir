<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all(); // Ambil semua produk dari database
        return view('admin.products.index', compact('products')); // Tampilkan ke view index
    }

    // Menampilkan form untuk menambah produk baru
    public function create()
    {
        return view('admin.products.create'); // Tampilkan form create
    }

    // Menyimpan produk baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'product_code' => 'required|string|max:255|unique:products,product_code',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string|max:100',
        ]);

        // Menyimpan produk baru ke database
        Product::create([
            'product_code' => $request->product_code,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
        ]);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product')); // Tampilkan form edit
    }

    // Mengupdate data produk ke dalam database
    public function update(Request $request, Product $product)
    {
        // Validasi input dari form
        $request->validate([
            'product_code' => 'required|string|max:255|unique:products,product_code,' . $product->id,
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string|max:100',
        ]);

        // Update data produk
        $product->update([
            'product_code' => $request->product_code,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
        ]);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk dari database
    public function destroy(Product $product)
    {
        // Hapus produk dari database
        $product->delete();

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
