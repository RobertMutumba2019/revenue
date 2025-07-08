@extends('layouts.well')

@section('content')
<div class="container">
    <h2>Available Districts</h2>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('viewdistricts') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by district name or code" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    @if($districts->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>District Name</th>
                    <th>District Code</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
                @foreach($districts as $index => $district)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $district->district_name }}</td>
                        <td>{{ $district->district_code }}</td>
                        <td>{{ \Carbon\Carbon::parse($district->district_date_added)->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">No districts found.</div>
    @endif
</div>
@endsection
