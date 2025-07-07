@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Edit Department</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('departments_update', $department->dept_id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="dept_name">Department Name</label>
            <input type="text" name="dept_name" class="form-control" value="{{ $department->dept_name }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection
