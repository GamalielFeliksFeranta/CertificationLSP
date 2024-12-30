@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Borrow</h1>

    <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="member_id" class="form-label">Member</label>
            <select name="member_id" id="member_id" class="form-select" required>
                <option value="">Select Member</option>
                @foreach($members as $member)
                <option value="{{ $member->id }}" {{ $borrowing->member_id == $member->id ? 'selected' : '' }}>
                    {{ $member->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">Select Book</option>
                @foreach($books as $book)
                <option value="{{ $book->id }}" {{ $borrowing->book_id == $book->id ? 'selected' : '' }}>
                    {{ $book->title }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="borrow_date" class="form-label">Borrow Date</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control"
                value="{{ old('borrow_date', $borrowing->borrow_date) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="return_date" class="form-label">Due Date</label>
            <input type="date" name="return_date" id="return_date" class="form-control"
                value="{{ old('return_date', $borrowing->return_date) }}" required readonly>
        </div>

        <div class="form-group mb-3">
            <label for="actual_return_date" class="form-label">Return Date</label>
            <input type="date" name="actual_return_date" id="actual_return_date" class="form-control"
                value="{{ old('actual_return_date', $borrowing->actual_return_date) }}">
        </div>

        <button type="submit" class="btn btn-success btn-lg w-100">Update</button>
    </form>
</div>
@endsection