@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Departments</h2>
</br>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('departments_create') }}" class="btn btn-primary mb-3">Add Department</a>

    <table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Department Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $index => $department)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $department->dept_name }}</td>
                <td>
                    <a href="{{ route('departments_edit', $department->dept_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ route('departments_destroy', $department->dept_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
