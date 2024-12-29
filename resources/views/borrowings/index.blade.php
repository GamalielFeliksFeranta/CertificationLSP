@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Peminjaman</h1>

    <a href="{{ route('borrowings.create') }}" class="btn btn-primary">Tambah Peminjaman</a>

    @if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->member->name }}</td>
                <td>{{ $borrowing->book->title }}</td>
                <td>{{ $borrowing->borrow_date }}</td>
                <td>{{ $borrowing->return_date }}</td>
                <td>
                    <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" class="d-inline">
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