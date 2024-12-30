@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Add Borrow</h1>

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="member_id" class="form-label">Member</label>
            <select name="member_id" id="member_id" class="form-select" required>
                <option value="">Select Member</option>
                @foreach($members as $member)
                <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">Select Book</option>
                @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="borrow_date" class="form-label">Borrow Date</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success btn-lg w-100">Save</button>
    </form>
</div>
@endsection