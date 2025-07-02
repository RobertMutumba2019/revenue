@extends('layouts.dashboard')

@section('title', 'SUNEF - Add User')

@section('content')
    <div class="dashboard-container">
        <!-- Add User Form -->
        <div class="form-card fade-in">
            <div class="form-header">
                <h2>ADD USER</h2>
                <div class="header-accent"></div>
            </div>
            
          
            <form action="{{ route('sysuser.store') }}" method="post" class="user-form">
                @csrf
   
                <div class="form-notice">
                    <p>All fields with <span class="required">*</span> are mandatory.</p>
                </div>

                <!-- Basic Information Section -->
                <div class="form-section">
                    <h3 class="section-title">Basic Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Surname <span class="required">*</span></label>
                            <input type="text" name="surname" required 
                                   class="form-input" 
                                   placeholder="Enter surname">
                        </div>

                        <div class="form-group">
                            <label>Other Name(s)</label>
                            <input type="text" name="othername" 
                                   class="form-input" 
                                   placeholder="Enter other names">
                        </div>

                        <div class="form-group">
                            <label>Telephone <span class="required">*</span></label>
                            <input type="tel" name="telephone" required 
                                   class="form-input" 
                                   placeholder="Enter phone number">
                        </div>

                        <div class="form-group">
                            <label>Email Address <span class="required">*</span></label>
                            <input type="email" name="email" required 
                                   class="form-input" 
                                   placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="user_gender" class="form-select">
                                <option value="">Select Gender</option>
                                    @foreach($gender as $genders)
                                   <option value="{{ $genders->id }}">{{ $genders->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Account Information Section -->
                <div class="form-section">
                    <h3 class="section-title">Account Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Department <span class="required">*</span></label>
                            <select name="user_department_id" required class="form-select">
                                <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                   <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label>Username <span class="required">*</span></label>
                            <input type="text" name="username" required 
                                   class="form-input" 
                                   placeholder="Enter username">
                        </div> --}}

                        <div class="form-group">
                            <label>User Role <span class="required">*</span></label>
                            <select name="designation" required class="form-select">
                                <option value="">Select Role</option>
                                    @foreach($designations as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group hidden">
                            <input type="hidden" name="check_number" value="<?php echo time(); ?>">
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="submit-btn" 
                            onclick="return confirm('Are you sure you want to save this user?');">
                        <i class="fas fa-save"></i> Save User
                    </button>
                </div>
            </form>
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

        /* Form Sections */
        .user-form {
            padding: 1.5rem;
        }

        .form-notice {
            background: #f0f9ff;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: #0369a1;
        }

        .required {
            color: var(--danger);
        }

        .form-section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e2e8f0;
        }

        /* Form Grid Layout */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #334155;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }

        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='none'%3e%3cpath d='M7 7l3-3 3 3m0 6l-3 3-3-3' stroke='%239ca3af' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        /* Form Actions */
        .form-actions {
            margin-top: 2rem;
            text-align: right;
        }

        .submit-btn {
            background: var(--primary);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .submit-btn i {
            margin-right: 0.5rem;
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection