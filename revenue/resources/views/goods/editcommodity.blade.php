@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h2>Edit Commodity</h2>
    <form action="{{ route('commodities.update', $commodity) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $commodity->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Is Service</label>
            <select name="is_service" class="form-control">
                <option value="0" {{ !$commodity->is_service ? 'selected' : '' }}>No</option>
                <option value="1" {{ $commodity->is_service ? 'selected' : '' }}>Yes</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
