@extends('layouts.app')

@section('content')
    <h2>Daftar Metode Pembayaran</h2>

    @if(Auth::user()->role === 'admin')
        <a href="{{ route('admin.payment-methods.create') }}" class="btn btn-primary">Tambah Metode Pembayaran</a>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama Metode</th>
                @if(Auth::user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($paymentMethods as $method)
                <tr>
                    <td>{{ $method->name }}</td>
                    @if(Auth::user()->role === 'admin')
                        <td>
                            <a href="{{ route('admin.payment-methods.edit', $method->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.payment-methods.destroy', $method->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus metode ini?')">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
