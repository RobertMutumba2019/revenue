@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Add Department</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('departments_store') }}">
        @csrf

        <div class="form-group">
            <label for="dept_name">Department Name</label>
            <input type="text" name="dept_name" class="form-control" value="{{ old('dept_name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Add</button>
    </form>
</div>
@endsection
