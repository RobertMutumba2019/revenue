@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Import Goods & Services</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('goods.import') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="file" class="form-label">CSV File</label>
            <input type="file" name="file" class="form-control" required>
        </div>

        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
</div>
@endsection
