@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h2>Commodities in Class: {{ $class->name }}</h2>
    <table class="table table-bordered">

    

    <thead>
<tr>
    <th>Code</th>
    <th>Name</th>
    <th>Is Service</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($commodities as $commodity)
<tr>
    <td>{{ $commodity->code }}</td>
    <td>{{ $commodity->name }}</td>
    <td>{{ $commodity->is_service ? 'Yes' : 'No' }}</td>
    <td>
        <a href="{{ route('commodities.edit', $commodity) }}" class="btn btn-sm btn-warning">Edit</a>

        <form action="{{ route('commodities.destroy', $commodity) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach

        
            
        </tbody>
    </table>
    <a href="{{ route('goods.classes', [$segment, $family]) }}" class="btn btn-secondary mt-3">← Back to Classes</a>
</div>
@endsection
