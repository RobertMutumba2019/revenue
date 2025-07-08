@extends('layouts.well')

@section('content')
<div class="container mt-4">
    <h2>Dictionary Entries</h2>

    <div class="form-group my-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by dictionary name...">
    </div>

    <table class="table table-bordered" id="dictionaryTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Description</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dictionaries as $dictionary)
                <tr>
                    <td>{{ $dictionary->d_name }}</td>
                    <td>{{ $dictionary->d_code }}</td>
                    <td>{{ $dictionary->d_description }}</td>
                    <td>{{ $dictionary->category->dc_name ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Simple JS search functionality --}}
<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#dictionaryTable tbody tr');

        rows.forEach(row => {
            const nameCell = row.querySelector('td').textContent.toLowerCase();
            row.style.display = nameCell.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endsection
