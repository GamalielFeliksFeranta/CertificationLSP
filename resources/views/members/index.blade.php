@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Members List</h1>
        <a href="{{ route('members.create') }}" class="roundedAdd btn bg-dark text-white btn-lg">
            <span class="mr-2">
                <i class="fa-solid fa-plus custom-icon"></i>
            </span>
        </a>
    </div>

    <table class="table table-bordered table-striped table-hover mx-auto">
        <thead class="table-light">
            <tr>
                <th class="text-center p-3">Name</th>
                <th class="text-center p-3">Email</th>
                <th class="text-center p-3">Phone</th>
                <th class="text-center p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td class="text-center p-3">{{ $member->name }}</td>
                <td class="text-center p-3">{{ $member->email }}</td>
                <td class="text-center p-3">{{ $member->phone_number }}</td>
                <td class="text-center p-3">
                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection