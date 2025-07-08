@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <h1>Import Dictionary Entries</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('dictionaries.import.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="d_category" class="form-label">Category <span class="text-danger">*</span></label>
                <select name="d_category" id="d_category" class="form-control">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('d_category') == $category->id ? 'selected' : '' }}>{{ $category->dc_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Attach CSV File <span class="text-danger">*</span></label>
                <input type="file" name="file" id="file" class="form-control" accept=".csv">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
            <a href="{{ route('dictionaries') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection