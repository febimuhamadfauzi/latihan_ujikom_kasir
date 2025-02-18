@extends('layouts.app')

@section('content')
@include('komponen.pesan')
<div class="container">
    <h1 class="mb-4">Tambah Produk Baru</h1>

    <div class="card shadow-sm p-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="product_code" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Masukkan kode produk" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama produk" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga produk" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan jumlah stok" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Pakaian">Pakaian</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan Produk</button>
            </div>
        </form>
    </div>
</div>
@endsection
