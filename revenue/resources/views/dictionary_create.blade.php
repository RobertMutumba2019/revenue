@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <h1>{{ isset($dictionary) ? 'Edit Dictionary Entry' : 'Add Dictionary Entry' }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ isset($dictionary) ? route('dictionaries.update', $dictionary) : route('dictionaries.store') }}" method="POST">
            @csrf
            @if (isset($dictionary))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="d_category" class="form-label">Category <span class="text-danger">*</span></label>
                <select name="d_category" id="d_category" class="form-control">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('d_category', isset($dictionary) ? $dictionary->d_category : '') == $category->id ? 'selected' : '' }}>{{ $category->dc_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="d_name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="d_name" id="d_name" class="form-control" value="{{ old('d_name', isset($dictionary) ? $dictionary->d_name : '') }}" placeholder="Enter name">
            </div>
            <div class="mb-3">
                <label for="d_code" class="form-label">Code <span class="text-danger">*</span></label>
                <input type="text" name="d_code" id="d_code" class="form-control" value="{{ old('d_code', isset($dictionary) ? $dictionary->d_code : '') }}" placeholder="Enter code">
            </div>
            <div class="mb-3">
                <label for="d_description" class="form-label">Description</label>
                <textarea name="d_description" id="d_description" class="form-control" placeholder="Enter description">{{ old('d_description', isset($dictionary) ? $dictionary->d_description : '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ isset($dictionary) ? 'Update' : 'Save' }}</button>
            <a href="{{ route('dictionaries') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection