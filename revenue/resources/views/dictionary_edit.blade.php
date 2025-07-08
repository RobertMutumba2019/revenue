@extends('layouts.dashboard')

@section('content')
    <h2>Edit Dictionary</h2>
    {{-- <form action="{{ route('dictionaries.update', $dictionary->id) }}" method="POST"> --}}
    <form action="{{ route('dictionaries.update', $dictionary) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="d_name" class="form-control" value="{{ old('d_name', $dictionary->d_name) }}">
        </div>

        <div class="form-group">
            <label>Code</label>
            <input type="text" name="d_code" class="form-control" value="{{ old('d_code', $dictionary->d_code) }}">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="d_description" class="form-control">{{ old('d_description', $dictionary->d_description) }}</textarea>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="d_category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $dictionary->d_category == $category->id ? 'selected' : '' }}>
                        {{ $category->dc_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
