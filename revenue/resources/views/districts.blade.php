@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>All Districts</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('districts_add') }}" class="btn btn-primary mb-3">Add District</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>District Name</th>
                <th>District Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($districts as $index => $district)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $district->district_name }}</td>
                    <td>{{ $district->district_code }}</td>
                    <td>
                        <a href="{{ route('districts_edit', $district->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('districts_delete', $district->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this district?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
