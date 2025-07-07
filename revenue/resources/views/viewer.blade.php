@extends('layouts.well')

@section('content')
<div class="container">
    <h2>All Participants</h2>

    <!-- Search & Download -->
    <form method="GET" action="{{ route('viewer') }}" class="search-form mb-3" style="display: flex; gap: 10px;">
        <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}" />
        <button type="submit">Search</button>
        <a href="{{ route('viewer') }}" class="btn btn-secondary">Reset</a>
        <a href="{{ route('download') }}" class="btn btn-success" target="_blank">Download PDF</a>
    </form>

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead style="background-color: #f0f0f0;">
            <tr>
                <th>No</th>
                <th>Surname</th>
                <th>Other Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Department</th>
                <th>User Role</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
            <tr>
                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->othername ?? 'N/A' }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->user_type === 'A')
                        <span style="color: green;">Admin</span>
                    @elseif($user->user_type === 'V')
                        <span style="color: blue;">Viewer</span>
                    @else
                        Unknown
                    @endif
                </td>
                <td>{{ $user->department->dept_name ?? 'N/A' }}</td>
                <td>{{ $user->designation->name ?? 'N/A' }}</td>
            </tr>
            @empty
            <tr><td colspan="7">No users found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $users->withQueryString()->links() }}
    </div>
</div>
@endsection
