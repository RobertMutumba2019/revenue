<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNEF - @yield('title', 'Dashboard')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #1d4ed8;
            --primary-dark: #1e3a8a;
            --accent: #06b6d4;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-active: #293548;
            --sidebar-text: #e2e8f0;
            --sidebar-icon: #94a3b8;
            --badge-bg: #ef4444;
            --card-bg: #ffffff;
            --body-bg: #f1f5f9;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #1d4ed8, #06b6d4, #059669, #d97706);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 100vh;
            margin: 0;
            padding-top: 72px;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .navbar {
            background: var(--primary-dark);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 72px;
            z-index: 1030;
            display: flex;
            align-items: center;
            padding: 0 24px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: #ffffff;
            font-weight: 600;
            font-size: 1.25rem;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 34px;
            margin-right: 12px;
            filter: brightness(1.2);
        }

        .user-profile {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(to bottom, var(--accent), #0e7490);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 600;
            font-size: 1rem;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .user-info {
            color: #ffffff;
            font-size: 0.875rem;
            line-height: 1.4;
        }

        .user-name {
            font-weight: 500;
        }

        .user-role {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.75rem;
        }

        .logout-btn {
            background: var(--badge-bg);
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }

        .logout-btn i {
            margin-right: 8px;
        }

        .sidebar {
            width: 280px;
            position: fixed;
            top: 72px;
            left: 0;
            bottom: 0;
            background: linear-gradient(to bottom, var(--sidebar-bg), #1e293b);
            color: var(--sidebar-text);
            z-index: 1020;
            overflow-y: auto;
            box-shadow: 4px 0 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .sidebar-menu {
            padding: 16px 0;
        }

        .menu-title {
            padding: 12px 24px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--sidebar-icon);
            margin: 8px 0;
            border-left: 3px solid transparent;
            opacity: 0.7;
        }

        .menu-item {
            position: relative;
            margin: 2px 0;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .menu-link:hover {
            background: var(--sidebar-hover);
            color: #ffffff;
            border-left-color: var(--accent);
            transform: translateX(4px);
        }

        .menu-link.active {
            background: var(--sidebar-active);
            color: #ffffff;
            border-left-color: var(--accent);
            font-weight: 600;
        }

        .menu-link i {
            width: 24px;
            text-align: center;
            margin-right: 12px;
            font-size: 1.1rem;
            color: var(--sidebar-icon);
            transition: all 0.3s ease;
        }

        .menu-link:hover i,
        .menu-link.active i {
            color: var(--accent);
        }

        .menu-badge {
            margin-left: auto;
            background: var(--badge-bg);
            color: #ffffff;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 12px;
            min-width: 24px;
            text-align: center;
            transition: transform 0.2s ease;
        }

        .menu-link:hover .menu-badge {
            transform: scale(1.1);
        }

        .submenu {
            max-height: 0;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.15);
            padding-left: 24px;
            transition: max-height 0.3s ease;
        }

        .menu-item.open .submenu {
            max-height: 500px;
        }

        .submenu .menu-link {
            padding: 10px 24px;
            font-size: 0.9rem;
            font-weight: 400;
        }

        .menu-toggle::after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            margin-left: auto;
            transition: transform 0.3s ease;
        }

        .menu-item.open .menu-toggle::after {
            transform: rotate(180deg);
        }

        .sidebar-footer {
            padding: 20px;
            text-align: center;
            font-size: 0.75rem;
            color: var(--sidebar-icon);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
        }

        .sidebar-footer a {
            color: var(--accent);
            text-decoration: none;
        }

        .sidebar-footer a:hover {
            text-decoration: underline;
        }

        .main-content {
            margin-left: 280px;
            padding: 32px;
            min-height: calc(100vh - 72px);
            background: var(--body-bg);
            transition: all 0.3s ease;
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 992px) {
            .sidebar {
                left: -280px;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .navbar-toggle {
                display: block;
            }

            .user-info {
                display: none;
            }

            .user-avatar {
                width: 36px;
                height: 36px;
            }

            .navbar-brand img {
                height: 28px;
            }
        }

        .navbar-toggle {
            display: none;
            background: none;
            border: none;
            color: #ffffff;
            font-size: 1.5rem;
            cursor: pointer;
            margin-right: 16px;
        }
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
                $userType = Session::get('user_type');
                $role = $userType === 'V' ? 'Normal' : (Session::get('user_department') ?? 'User');
                $initials = strtoupper(substr($name, 0, 1));
            @endphp

            <div class="user-avatar" aria-haspopup="true" aria-expanded="false">{{ $initials }}</div>
            <div class="user-info">
                <div class="user-name">{{ $name }}</div>
                <div class="user-role">{{ $role }}</div>
           

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="logout-btn"
               onclick="event.preventDefault(); if (confirm('Do you intend to logout?')) document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    @endif
</nav>


    <aside class="sidebar">
        <div class="sidebar-menu">
            <div class="menu-title">MAIN NAVIGATION</div>
            <div class="menu-item">
                <a href="{{ url('/welcome') }}" class="menu-link @if(Route::currentRouteName() == 'well') active @endif">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link menu-toggle">
                    <i class="fas fa-user"></i>
                    <span>Users</span>
                </a>
                <div class="submenu">

                    <a href="/viewer" class="menu-link">All clients</a>
                    <a href="/change-password" class="menu-link">Change Password</a>

                </div>
            </div>
            <div class="menu-item">
                <a href="/viewdistricts" class="menu-link">
                    <i class="fas fa-building"></i>
                    <span>All Districts.</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link menu-toggle">
                    <i class="fas fa-user-circle"></i>
                    <span>User Role</span>
                </a>
                <div class="submenu">
                    <a href="#" class="menu-link">Add Role</a>
                    <a href="#" class="menu-link">View Roles</a>
                </div>
            </div>
            <div class="menu-item" style="display:none;">
                <a href="#" class="menu-link menu-toggle">
                    <i class="fas fa-cog"></i>
                    <span>Change Log</span>
                </a>
                <div class="submenu">
                    <a href="#" class="menu-link">Log Entry 1</a>
                </div>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link menu-toggle">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>EFris Modules</span>
                </a>
                <div class="submenu">
                    <a href="#" class="menu-link">EFRis Error Log</a>
                    <a href="#" class="menu-link">EFRis Stock</a>
                    <a href="#" class="menu-link">Goods Upload</a>
                </div>
            </div>
            <div class="menu-item" style="display:none;">
                <a href="#" class="menu-link">
                    <i class="fas fa-money-bill"></i>
                    <span>Payment Information</span>
                </a>
            </div>
            <div class="menu-item" style="display:none;">
                <a href="#" class="menu-link">
                    <i class="fas fa-file-text"></i>
                    <span>Other Invoices</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link menu-toggle">
                    <i class="fas fa-table"></i>
                    <span>Commodity Code</span>
                </a>
                <div class="submenu">
                    <a href="#" class="menu-link">Item A</a>
                    <a href="#" class="MENU-LINK">ITEM B</a>
                </div>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-book"></i>
                    <span>Dictionary</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-history"></i>
                    <span>Audit Trail</span>
                </a>
            </div>
            <div class="sidebar-footer">
                <p>SUNEF © 2025 | <a href="#">Support</a></p>
            </div>
        </div>
    </aside>

    <main class="main-content">
        @yield('content')
    </main>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.navbar-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Toggle submenu
        document.querySelectorAll('.menu-toggle').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const parent = this.parentElement;
                parent.classList.toggle('open');
            });
        });

        // Session timeout handler
        const sessionLifetime = {{ config('session.lifetime') * 60 * 1000 }}; // Convert minutes to milliseconds
        const warningTime = sessionLifetime - (5 * 60 * 1000); // Show warning 5 minutes before timeout
        let timeoutId;

        function resetSessionTimeout() {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                alert('Your session is about to expire due to inactivity. Click OK to extend your session.');
                fetch('{{ url("/keep-alive") }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                })
                    .then(response => response.json())
                    .then(data => console.log(data.message))
                    .catch(error => console.error('Error extending session:', error));
            }, warningTime);
        }

        // Reset timeout on user activity
        ['click', 'mousemove', 'keypress'].forEach(event => {
            document.addEventListener(event, resetSessionTimeout);
        });

        // Start the timer on page load
        resetSessionTimeout();
    </script>
</body>
</html>