@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Petugas</h1>
        <div class="card shadow-sm p-4">
            <form id="editPetugasForm" action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $petugas->nama) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $petugas->email) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $petugas->nomor_telepon) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Password (Opsional)</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('admin.petugas.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Update Petugas</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function confirmUpdate() {
            if (confirm("Apakah Anda yakin ingin mengubah data ini?")) {
                document.getElementById("editPetugasForm").submit();
            }
        }
    </script>
@endsection
