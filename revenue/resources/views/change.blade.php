@extends('layouts.well') 
@section('content')
<style>
    .form-wrapper {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transition: 0.3s ease-in-out;
    }

    .form-wrapper:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .form-header {
        background: linear-gradient(45deg, #007bff, #0056b3);
        padding: 20px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        color: #fff;
        text-align: center;
    }

    .form-footer {
        font-size: 0.9rem;
        color: #6c757d;
        text-align: center;
        margin-top: 20px;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="col-md-6">
        <div class="form-wrapper">
            <div class="form-header">
                <h3 class="mb-0"><i class="fas fa-key me-2"></i> Change Your Password</h3>
            </div>

            <div class="p-4">

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Error Messages --}}
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Password Change Form --}}
                <form method="POST" action="{{ route('change.password') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter your current password" required>
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Create a new password" required>
                        <small class="form-text text-muted">Must be at least 6 characters, and include letters and symbols.</small>
                    </div>

                    <div class="mb-4">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Re-enter new password" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-sync-alt me-1"></i> Update Password
                        </button>
                    </div>
                </form>

                <div class="form-footer mt-4">
                    For security, make sure your new password is unique and not shared.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
