@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Add District</h2>

    <form method="POST" action="{{ route('districts_store') }}">
        @csrf

        <div class="mb-3">
            <label for="district_name" class="form-label">District Name</label>
            <input type="text" name="district_name" class="form-control" value="{{ old('district_name') }}" required>
            @error('district_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="district_code" class="form-label">District Code</label>
            <input type="text" name="district_code" class="form-control" value="{{ old('district_code') }}" required>
            @error('district_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Add District</button>
        <a href="{{ route('districts_all') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
