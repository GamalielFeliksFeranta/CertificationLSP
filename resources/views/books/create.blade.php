@extends('layouts.app')

@section('content')
<h1>Add New Book</h1>
<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
    </div>
    <div class="form-group">
        <label for="year">Year</label>
        <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection