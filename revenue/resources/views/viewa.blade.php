@extends('layouts.dashboard')

@section('title', 'SUNEF - View Users')

@section('content')
<div class="dashboard-container">
    <!-- View Users Card -->
    <div class="form-card fade-in">
        <div class="form-header">
            <h2>Added Users</h2>
            <div class="header-accent"></div>
        </div>

        <div class="user-form">
            <!-- Success/Error Messages -->
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Search Form -->
            <form method="GET" action="{{ route('viewa') }}" class="search-form">
                <div class="search-container">
                    <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}" class="form-input" />
                    <button type="submit" class="submit-btn"><i class="fas fa-search"></i> Search</button>
                    <a href="{{ route('viewa') }}" class="clear-btn">Refresh</a>
                </div>
            </form>

            <!-- Delete Form -->
            <form method="POST" action="{{ route('destroy') }}" id="delete-users-form" 
                  onsubmit="return confirm('Delete selected users?');">
                @csrf
                <div class="table-actions">
                    <button type="submit" class="delete-btn"><i class="fas fa-trash"></i> Delete Selected</button>
                </div>
                <table class="users-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all" /></th>
                            <th>Surname</th>
                            <th>Other Name</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Department</th>
                            <th>User Role</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Online</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td><input type="checkbox" name="user_ids[]" value="{{ $user->id }}"></td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->othername ?? 'N/A' }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender->name ?? 'N/A' }}</td>
                            <td>{{ $user->department->name ?? 'N/A' }}</td>
                            <td>{{ $user->designation->name ?? 'N/A' }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->password }}</td>
                            <td>
    @if ($user->isActive())
        <span class="badge bg-success">Active</span>
    @else
        <span class="badge bg-danger">Locked</span>
    @endif
</td>

<td>
    @if ($user->isOnline())
        <span class="badge bg-primary">Online</span>
    @else
        <span class="badge bg-secondary">Offline</span>
    @endif
</td>

                            
                        </tr>
                        @empty
                        <tr><td colspan="8" class="no-results">No users found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </form>

            <!-- Pagination -->
            <div class="pagination">
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    /* Base Styles */
    :root {
        --primary: #1d4ed8;
        --primary-dark: #1e3a8a;
        --accent: #06b6d4;
        --danger: #ef4444;
        --success: #10b981;
        --light-bg: #f8fafc;
        --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 1.5rem;
    }

    /* Form Card */
    .form-card {
        background: white;
        border-radius: 0.5rem;
        box-shadow: var(--card-shadow);
        overflow: hidden;
    }

    .form-header {
        background: var(--primary-dark);
        color: white;
        padding: 1.5rem;
        position: relative;
    }

    .form-header h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .header-accent {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--accent), var(--primary));
    }

    .user-form {
        padding: 1.5rem;
    }

    /* Search Form */
    .search-form {
        margin-bottom: 1.5rem;
    }

    .search-container {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .form-input {
        flex: 1;
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        transition: all 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
    }

    .submit-btn, .clear-btn, .delete-btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 0.375rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
    }

    .submit-btn {
        background: var(--primary);
        color: white;
    }

    .submit-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
    }

    .clear-btn {
        background: #e2e8f0;
        color: #334155;
        text-decoration: none;
    }

    .clear-btn:hover {
        background: #d1d5db;
        transform: translateY(-1px);
    }

    .delete-btn {
        background: var(--danger);
        color: white;
    }

    .delete-btn:hover {
        background: #b91c1c;
        transform: translateY(-1px);
    }

    .submit-btn i, .delete-btn i {
        margin-right: 0.5rem;
    }

    /* Table */
    .table-actions {
        margin-bottom: 1rem;
        text-align: right;
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    .users-table th, .users-table td {
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
        text-align: left;
    }

    .users-table th {
        background: var(--primary-dark);
        color: white;
        font-weight: 600;
    }

    .users-table tr:nth-child(even) {
        background: #f8fafc;
    }

    .users-table tr:hover {
        background: #f0f9ff;
    }

    .no-results {
        text-align: center;
        color: #64748b;
        padding: 1rem;
    }

    /* Alerts */
    .alert {
        padding: 0.75rem 1rem;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }

    .alert-success {
        background: #ecfdf5;
        color: #047857;
    }

    .alert-danger {
        background: #fef2f2;
        color: #b91c1c;
    }

    /* Pagination */
    .pagination {
        margin-top: 1.5rem;
        display: flex;
        justify-content: center;
        gap: 0.5rem;
    }

    .pagination a {
        padding: 0.5rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        text-decoration: none;
        color: var(--primary);
        transition: all 0.2s;
    }

    .pagination a:hover {
        background: var(--light-bg);
        border-color: var(--accent);
    }

    .pagination .current {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    /* Animations */
    .fade-in {
        animation: fadeIn 0.5s ease forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1rem;
        }

        .search-container {
            flex-direction: column;
            align-items: stretch;
        }

        .users-table {
            display: block;
            overflow-x: auto;
        }
    }
</style>

<script>
document.getElementById('select-all').addEventListener('change', function(e) {
    const checkboxes = document.querySelectorAll('input[name="user_ids[]"]');
    checkboxes.forEach(cb => cb.checked = e.target.checked);
});
</script>
@endsection