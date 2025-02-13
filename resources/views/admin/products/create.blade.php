@extends('layouts.app')

@section('content')
@include('komponen.pesan')
<div class="container">
    <h1 class="mb-4">Tambah Produk Baru</h1>

    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_code" class="form-label">Kode Produk</label>
            <input type="number" class="form-control" id="product_code" name="product_code" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Produk</button>
    </form>
</div>
@endsection
