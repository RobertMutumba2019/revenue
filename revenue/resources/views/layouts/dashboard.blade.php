
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SUNEF - EFRIS Integrator')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset & Base Styles */
        :root {
            --primary: #1d4ed8;
            --primary-dark: #1e3a8a;
            --accent: #06b6d4;
            --light-green: #10b981;
            --purple: #8b5cf6;
            --orange: #f59e0b;
            --pink: #ec4899;
            --light-bg: #f8fafc;
            --dark-bg: #1f2937;
            --text-primary: #1f2937;
            --text-secondary: #64748b;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --card-shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --border-radius: 0.75rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-primary);
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
        }

        /* Navbar Styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            color: #ffffff;
            height: 64px;
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            box-shadow: var(--card-shadow);
            z-index: 1100;
            transition: var(--transition);
        }

        .navbar-toggle {
            display: none;
            background: none;
            border: none;
            color: #ffffff;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }

        .navbar-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .navbar-brand img {
            height: 36px;
            margin-right: 0.75rem;
            filter: brightness(1.1);
            transition: var(--transition);
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .user-profile {
            margin-left: auto;
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), #0e7490);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1rem;
            font-weight: 600;
            border: 2px solid #ffffff;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            cursor: pointer;
        }

        .user-avatar:hover {
            transform: scale(1.05);
            box-shadow: var(--card-shadow-hover);
        }

        .user-info {
            display: flex;
            flex-direction: column;
            color: #ffffff;
            font-size: 0.9rem;
        }

        .user-name {
            font-weight: 600;
        }

        .user-role {
            font-size: 0.75rem;
            opacity: 0.85;
        }

        .user-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background: #ffffff;
            color: var(--text-primary);
            min-width: 180px;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            z-index: 1200;
            margin-top: 0.5rem;
            opacity: 0;
            transform: translateY(-10px);
            transition: var(--transition);
        }

        .user-dropdown.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .user-dropdown a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-primary);
            text-decoration: none;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .user-dropdown a:hover {
            background: var(--light-bg);
            color: var(--primary);
        }

        .user-dropdown a i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background-color: var(--dark-bg);
            color: #f8fafc;
            display: flex;
            flex-direction: column;
            padding: 1.5rem 0;
            position: fixed;
            top: 64px;
            height: calc(100vh - 64px);
            transition: var(--transition);
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar a, .sidebar button {
            display: flex;
            align-items: center;
            color: #f8fafc;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border: none;
            background: none;
            width: 100%;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            outline: none;
            border-left: 4px solid transparent;
            transition: var(--transition);
        }

        .sidebar a:hover, .sidebar button:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: var(--accent);
            color: #ffffff;
        }

        .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left-color: var(--accent);
            font-weight: 600;
        }

        .sidebar a .icon, .sidebar button .icon {
            margin-right: 1rem;
            width: 24px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar .dropdown-btn {
            justify-content: space-between;
            font-weight: 600;
        }

        .sidebar .dropdown-container {
            display: none;
            flex-direction: column;
            padding-left: 2rem;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .sidebar .dropdown-container a {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            border-left: none;
        }

        .sidebar .dropdown-container a:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-left-color: var(--accent);
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 260px;
            padding: 2rem;
            flex-grow: 1;
            background-color: var(--light-bg);
            min-height: 100vh;
            margin-top: 64px;
        }

        /* Block Header */
        .block-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e5e7eb;
            position: relative;
        }

        .block-header h2::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100px;
            height: 2px;
            background-color: var(--accent);
        }

        /* Info Box Grid */
        .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        /* Info Box Styles */
        .info-box {
            border-radius: var(--border-radius);
            padding: 1.5rem;
            display: flex;
            align-items: center;
            transition: var(--transition);
            box-shadow: var(--card-shadow);
            color: white;
            background: linear-gradient(135deg, var(--light-green), #059669);
        }

        .info-box:hover {
            transform: translateY(-4px);
            box-shadow: var(--card-shadow-hover);
        }

        .info-box .icon {
            font-size: 2.25rem;
            margin-right: 1.25rem;
            opacity: 0.85;
            transition: var(--transition);
        }

        .info-box:hover .icon {
            transform: scale(1.1);
        }

        .info-box .content {
            flex: 1;
        }

        .info-box .text {
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.95;
            margin-bottom: 0.25rem;
        }

        .info-box .number {
            font-size: 1.875rem;
            font-weight: 700;
            line-height: 1.2;
        }

        /* Color Variants */
        .bg-light-green { background: linear-gradient(135deg, var(--light-green), #059669); }
        .bg-purple { background: linear-gradient(135deg, var(--purple), #7c3aed); }
        .bg-orange { background: linear-gradient(135deg, var(--orange), #d97706); }
        .bg-pink { background: linear-gradient(135deg, var(--pink), #db2777); }

        /* Statistics Section */
        .stat-section {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--card-shadow);
            margin-top: 2rem;
            transition: var(--transition);
        }

        .stat-section:hover {
            box-shadow: var(--card-shadow-hover);
        }

        .stat-section h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 1.5rem;
        }

        .stat-section table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .stat-section tr:not(:last-child) {
            border-bottom: 1px solid #e5e7eb;
        }

        .stat-section td {
            padding: 1rem;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .stat-section tr:hover td {
            background-color: #f8fafc;
        }

        .stat-section td:nth-child(odd) {
            font-weight: 500;
            color: var(--text-secondary);
        }

        .stat-section td:nth-child(even) {
            font-weight: 600;
            color: var(--primary-dark);
        }

        .stat-section .divider {
            width: 1px;
            background-color: #e5e7eb;
            position: relative;
        }

        .stat-section .divider::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            height: 70%;
            width: 1px;
            background-color: #d1d5db;
        }

        /* Form Styles */
        .form-container {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            transition: var(--transition);
        }

        .form-container:hover {
            box-shadow: var(--card-shadow-hover);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
        }

        .must {
            color: var(--pink);
            margin-left: 0.25rem;
        }

        .password-hint {
            color: var(--pink);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: none;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-success {
            background-color: var(--light-green);
            color: white;
        }

        .btn-success:hover {
            background-color: #059669;
            transform: translateY(-1px);
        }

        .btn-danger {
            background-color: var(--pink);
            color: white;
        }

        .btn-danger:hover {
            background-color: #db2777;
            transform: translateY(-1px);
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            box-shadow: var(--card-shadow);
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f8fafc;
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .sidebar {
                width: 220px;
            }
            .main-content {
                margin-left: 220px;
            }
            .navbar {
                padding: 0 1rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                height: 56px;
            }
            .navbar-brand img {
                height: 28px;
            }
            .navbar-brand span {
                font-size: 1rem;
            }
            .user-info {
                display: none;
            }
            .user-avatar {
                width: 36px;
                height: 36px;
            }
            .navbar-toggle {
                display: block;
            }
            .sidebar {
                width: 260px;
                transform: translateX(-100%);
                top: 56px;
                height: calc(100vh - 56px);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                margin-top: 56px;
                padding: 1.5rem;
            }
            .row {
                grid-template-columns: 1fr;
            }
            .stat-section td {
                padding: 0.75rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 1rem;
            }
            .block-header h2 {
                font-size: 1.5rem;
            }
            .info-box .number {
                font-size: 1.5rem;
            }
            .stat-section {
                padding: 1.25rem;
            }
            .navbar-brand span {
                display: none;
            }
            .navbar-brand img {
                margin-right: 0;
            }
        }

        /* Animation Enhancements */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .info-box, .stat-section, .form-container {
            animation: fadeIn 0.6s ease forwards;
        }

        .info-box:nth-child(1) { animation-delay: 0.1s; }
        .info-box:nth-child(2) { animation-delay: 0.2s; }
        .info-box:nth-child(3) { animation-delay: 0.3s; }
        .info-box:nth-child(4) { animation-delay: 0.4s; }
        .stat-section, .form-container { animation-delay: 0.5s; }
    </style>
</head>
<body>

    <nav class="navbar" aria-label="Main navigation">
    <button class="navbar-toggle" aria-label="Toggle sidebar" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </button>
    <a href="/admind" class="navbar-brand">
        <img src="{{ asset('images/sunef.png') }}" alt="SUNEF Logo" onerror="this.src='https://via.placeholder.com/36?text=Logo'">
        <span>SUNEF - EFRIS Integrator</span>
    </a>

    @if(Session::has('user_logged_in'))
        <div class="user-profile">
            @php
                $name = Session::get('user_name') ?? 'User';
                $userType = Session::get('user_type'); // 'A' or 'C'
                $role = $userType === 'A' ? 'Administrator' : (Session::get('user_department') ?? 'User');
                $initials = strtoupper(substr($name, 0, 1));
            @endphp
            <div class="user-avatar" aria-haspopup="true" aria-expanded="false">{{ $initials }}</div>
            <div class="user-info">
                <div class="user-name">{{ $name }}</div>
                <div class="user-role">{{ $role }}</div>
            </div>

            <div class="user-dropdown" aria-label="User menu">
            

                
                <a href="/logout" onclick="return confirm('Are you sure you want to logout?');"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    @endif
</nav>


    <aside class="sidebar" aria-label="Sidebar navigation">
        <a href="/admind" class="@if(Route::is('admind')) active @endif">
            <span class="icon"><i class="fas fa-tachometer-alt"></i></span> Dashboard
        </a>
        <button class="dropdown-btn" aria-expanded="false">
            <span><span class="icon"><i class="fas fa-users-cog"></i></span> Manage Users</span>
            <i class="fas fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/user" class="@if(Route::is('user')) active @endif">
                <i class="fas fa-user-plus"></i> Add Users</a>
            <a href="/viewa" class="@if(Route::is('viewa')) active @endif" ><i class="fas fa-user"></i> View Users</a>
        </div>

        <div>

        <a href="/settings" >
            <span class="icon"><i class="fas fa-cogs"></i></span> Settings
        </a>
    </div>

      <div>

        <a href="/change-password" >
            <span class="icon"><i class="fas fa-sync-alt me-1"></i></span> Update Password.
        </a>
    </div>

        <a href="/departments" >
            <span class="icon"><i class="fas fa-home"></i></span> Department
        </a>

        

        <a href="/designations" >
            <span class="icon"><i class="fas fa-user-circle"></i></span> Designations
        </a>
        
        <a href="/welcome" >
            <span class="icon"><i class="fas fa-home"></i></span> Users Page
        </a>
        {{-- log out --}}
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
           </form>
        

        <div class="menu-item">
        <a href="#" class="menu-link"
            onclick="event.preventDefault(); 
                if (confirm('Do you intend to logout?')) {
                    document.getElementById('logout-form').submit();
                }">
            <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</div>
  
    </aside>
    <main class="main-content">
        @yield('content')
    </main>
    <script>
        // Navbar and Sidebar toggle
        const navbarToggle = document.querySelector('.navbar-toggle');
        const sidebar = document.querySelector('.sidebar');
        navbarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            navbarToggle.setAttribute('aria-expanded', sidebar.classList.contains('active'));
        });

        // Dropdown toggle
        const dropdownBtns = document.querySelectorAll('.dropdown-btn');
        dropdownBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const dropdown = btn.nextElementSibling;
                dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
                btn.querySelector('i.fas.fa-caret-down').classList.toggle('fa-rotate-180');
                btn.setAttribute('aria-expanded', dropdown.style.display === 'flex');
            });
        });

        // User dropdown toggle
        const userAvatar = document.querySelector('.user-avatar');
        const userDropdown = document.querySelector('.user-dropdown');
        userAvatar.addEventListener('click', () => {
            userDropdown.classList.toggle('active');
            userAvatar.setAttribute('aria-expanded', userDropdown.classList.contains('active'));
        });

        // Close user dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userAvatar.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.remove('active');
                userAvatar.setAttribute('aria-expanded', 'false');
            }
        });

        // Keyboard accessibility for dropdowns
        document.querySelectorAll('.dropdown-btn, .user-avatar').forEach(btn => {
            btn.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    btn.click();
                }
            });
        });
    </script>
</body>
</html>
