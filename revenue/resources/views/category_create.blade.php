@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <h1>{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="POST">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="dc_name" class="form-label">Category Name <span class="text-danger">*</span></label>
                <input type="text" name="dc_name" id="dc_name" class="form-control" value="{{ old('dc_name', isset($category) ? $category->dc_name : '') }}" placeholder="Enter category name">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ isset($category) ? 'Update' : 'Save' }}</button>
            <a href="{{ route('categories') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection