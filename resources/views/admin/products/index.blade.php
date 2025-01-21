@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
@endsection

@section('content')
<div class="container">
    <h1 class="page-title mb-4">Daftar Produk</h1>

    <!-- Tombol Tambah Produk -->
    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    <!-- Tabel Daftar Produk -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Form untuk Hapus Produk -->
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
