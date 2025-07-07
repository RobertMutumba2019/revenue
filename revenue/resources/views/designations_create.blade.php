@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Add Designation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('designations_store') }}">
        @csrf
        <div class="form-group">
            <label>Designation Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter designation name">
        </div>
        <button type="submit" class="btn btn-success mt-2">Save</button>
    </form>
</div>
@endsection
