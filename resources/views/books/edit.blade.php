@extends('layouts.app')

@section('content')
<h1>Edit Book</h1>
<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
    </div>
    <div class="form-group">
        <label for="year">Year</label>
        <input type="number" name="year" id="year" class="form-control" value="{{ $book->year }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection