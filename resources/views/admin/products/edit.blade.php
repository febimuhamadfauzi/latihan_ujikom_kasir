@extends('layouts.app')

@section('css')
<style>
/* Container */
.container {
    max-width: 800px; /* Batasi lebar agar tidak terlalu lebar */
    margin-top: 20px;
}

/* Card Styling */
.card {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

/* Form Input */
.form-control {
    border-radius: 8px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 16px;
}

/* Form Label */
.form-label {
    font-weight: bold;
    color: #333;
}

/* Tombol */
.btn-success {
    background-color: #28a745;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 8px;
    transition: 0.3s;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-secondary {
    background-color: #6c757d;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 8px;
    transition: 0.3s;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

/* Responsif untuk Mobile */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    .btn-success, .btn-secondary {
        width: 100%; /* Tombol full-width di layar kecil */
        margin-top: 10px;
    }
}

</style>
@endsection

@section('content')
@include('komponen.pesan')
<div class="container">
    <h1 class="mb-4">Edit Produk</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('product.update', $product->id) }}" method="POST" onsubmit="return confirmUpdate();">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="product_code" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" value="{{ old('product_code', $product->product_code) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Makanan" {{ $product->category == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="Minuman" {{ $product->category == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                    <option value="Elektronik" {{ $product->category == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                    <option value="Pakaian" {{ $product->category == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Perbarui Produk</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript untuk Konfirmasi -->
<script>
function confirmUpdate() {
    return confirm("Apakah Anda yakin ingin memperbarui produk ini?");
}
</script>

@endsection
