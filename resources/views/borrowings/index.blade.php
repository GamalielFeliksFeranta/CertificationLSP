@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Borrow List</h1>
        <a href="{{ route('borrowings.create') }}" class="roundedAdd btn bg-dark text-white btn-lg">
            <span class="mr-2">
                <i class="fa-solid fa-plus custom-icon"></i>
            </span>
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered table-striped table-hover mx-auto">
        <thead class="table-light">
            <tr>
                <th class="text-center p-3">Member Name</th>
                <th class="text-center p-3">Book Title</th>
                <th class="text-center p-3">Borrow Date</th>
                <th class="text-center p-3">Due Date</th>
                <th class="text-center p-3">Return Date</th>
                <th class="text-center p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowings as $borrowing)
            <tr>
                <td class="text-center p-3">{{ $borrowing->member->name }}</td>
                <td class="text-center p-3">{{ $borrowing->book->title }}</td>
                <td class="text-center p-3">{{ $borrowing->borrow_date }}</td>
                <td class="text-center p-3">{{ $borrowing->return_date }}</td>
                <td class="text-center p-3" 
                    style="color: 
                        @if($borrowing->actual_return_date) 
                            {{ $borrowing->actual_return_date > $borrowing->return_date ? 'red' : 'green' }} 
                        @endif;">
                    {{ $borrowing->actual_return_date ?? '-' }}
                </td>

                <td class="text-center p-3">
                    @if(is_null($borrowing->actual_return_date))
                        <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pencil"></i>
                        </a>

                        <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection