@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Designations</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('designations_create') }}" class="btn btn-primary mb-3">Add Designation</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($designations as $designation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $designation->name }}</td>
                    <td>
                        <a href="{{ route('designations_edit', $designation) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('designations_destroy', $designation) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
