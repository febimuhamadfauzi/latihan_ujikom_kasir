@extends('layouts.app')

@section('content')
    <h2>Tambah Metode Pembayaran</h2>

    <form action="{{ route('admin.payment-methods.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Metode Pembayaran</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.payment-methods.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
