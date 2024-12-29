@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Peminjaman</h1>

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="member_id" class="form-label">Anggota</label>
            <select name="member_id" id="member_id" class="form-select" required>
                <option value="">Pilih Anggota</option>
                @foreach($members as $member)
                <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Buku</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">Pilih Buku</option>
                @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrow_date" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection