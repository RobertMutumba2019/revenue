@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>All Departments</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('departments.create') }}" class="btn btn-success mb-3">+ Add Department</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Department Name</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $index => $department)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr><td colspan="3">No departments yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
