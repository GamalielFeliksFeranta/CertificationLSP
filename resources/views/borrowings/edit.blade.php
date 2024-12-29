@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Peminjaman</h1>

    <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="member_id" class="form-label">Anggota</label>
            <select name="member_id" id="member_id" class="form-select" required>
                <option value="">Pilih Anggota</option>
                @foreach($members as $member)
                <option value="{{ $member->id }}" {{ $borrowing->member_id == $member->id ? 'selected' : '' }}>
                    {{ $member->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Buku</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">Pilih Buku</option>
                @foreach($books as $book)
                <option value="{{ $book->id }}" {{ $borrowing->book_id == $book->id ? 'selected' : '' }}>
                    {{ $book->title }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrow_date" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control"
                value="{{ old('borrow_date', $borrowing->borrow_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Tanggal Kembali</label>
            <input type="date" name="return_date" id="return_date" class="form-control"
                value="{{ old('return_date', $borrowing->return_date) }}" required readonly>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection