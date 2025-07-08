@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <h1>Dictionary Entries</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('dictionaries.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Entry</a>
        <a href="{{ route('dictionaries.import') }}" class="btn btn-primary mb-3"><i class="fas fa-upload"></i> Import Entries</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dictionaries as $index => $dictionary)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dictionary->d_name }}</td>
                        <td>{{ $dictionary->d_code }}</td>
                        <td>{{ $dictionary->d_description }}</td>
                        <td>{{ $dictionary->category->dc_name }}</td>
                        <td>
                            <a href="{{ route('dictionaries.edit', $dictionary) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('dictionaries.destroy', $dictionary) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection