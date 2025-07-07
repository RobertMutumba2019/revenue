@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Edit Designation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('designations_update', $designation) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Designation Name</label>
            <input type="text" name="name" class="form-control" value="{{ $designation->name }}">
        </div>
        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection
