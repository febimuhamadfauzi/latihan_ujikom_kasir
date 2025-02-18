<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk dengan pencarian dan pagination
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('product_code', 'like', "%$search%");
        }

        $products = $query->paginate(3)->appends(['search' => $request->search]);

        return view('admin.products.index', compact('products'));
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
            'product_code' => 'required|string|min:0|unique:products,product_code',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:100',
        ], [
            'product_code.required' => 'No produk wajib diisi',
            'product_code.min' => 'No produk tidak boleh minus',
            'product_code.unique' => 'No produk tidak boleh sama',
            'price.min' => 'Harga tidak boleh minus',
            'price.required' => 'Harga wajib diisi',
            'stock.required' => 'Stok wajib diisi',
            'stock.min' => 'Stok tidak boleh minus',
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
            'product_code' => 'required|string|min:0|unique:products,product_code,' . $product->id,
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:100',
        ], [
            'product_code.required' => 'No produk wajib diisi',
            'product_code.min' => 'No produk tidak boleh minus',
            'product_code.unique' => 'No produk tidak boleh sama',
            'price.min' => 'Harga tidak boleh minus',
            'price.required' => 'Harga wajib diisi',
            'stock.required' => 'Stok wajib diisi',
            'stock.min' => 'Stok tidak boleh minus',
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
