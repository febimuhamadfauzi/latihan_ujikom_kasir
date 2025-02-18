@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Petugas</h1>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Form Pencarian -->
            <form action="{{ route('admin.petugas.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari petugas..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>

            <!-- Tombol Tambah Petugas -->
            <a href="{{ route('admin.petugas.create') }}" class="btn btn-success">+ Tambah Petugas</a>
        </div>

        <div class="card shadow-sm p-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($petugas as $p)
                        <tr>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->nomor_telepon }}</td>
                            <td>
                                <a href="{{ route('admin.petugas.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.petugas.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus petugas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data petugas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $petugas->appends(['search' => request('search')])->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
