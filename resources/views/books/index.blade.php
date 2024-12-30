@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Books Catalog</h1>
        <a href="{{ route('books.create') }}" class="roundedAdd btn bg-dark text-white btn-lg">
            <span class="mr-2">
                <i class="fa-solid fa-plus custom-icon"></i>
            </span>
        </a>
    </div>

    <table class="table table-bordered table-striped table-hover mx-auto">
        <thead class="table-light">
            <tr>
                <th class="text-start p-3">Title</th>
                <th class="text-center p-3">Author</th>
                <th class="text-center p-3">Year</th>
                <th class="text-center p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td class="text-start p-3">{{ $book->title }}</td>
                <td class="text-center p-3">{{ $book->author }}</td>
                <td class="text-center p-3">{{ $book->year }}</td>
                <td class="text-center p-3">
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm"><i
                            class="fa-solid fa-pencil"></i></a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i
                                class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection