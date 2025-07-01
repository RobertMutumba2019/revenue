<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNEF - Dashboard</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #1d4ed8;       /* Blue-700 */
            --primary-dark: #1e3a8a;  /* Blue-900 */
            --accent: #06b6d4;        /* Cyan-500 */
            --sidebar-bg: #0f172a;     /* Slate-900 */
            --sidebar-hover: #1e293b;  /* Slate-800 */
            --sidebar-active: #293548; /* Slate-700 */
            --sidebar-text: #e2e8f0;   /* Slate-200 */
            --sidebar-icon: #94a3b8;   /* Slate-400 */
            --badge-bg: #ef4444;      /* Red-500 */
            --card-bg: #ffffff;       /* White */
            --body-bg: #f1f5f9;       /* Slate-100 */
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
            display: none;
            background: rgba(0, 0, 0, 0.15);
            padding-left: 24px;
        }

        details[open] .submenu {
            display: block;
        }

        .submenu .menu-link {
            padding: 10px 24px;
            font-size: 0.9rem;
            font-weight: 400;
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
    <nav class="navbar">
        <button class="navbar-toggle">
            <i class="fas fa-bars"></i>
        </button>
        <a href="#" class="navbar-brand">
            <img src="images/sunef.png" alt="SUNEF Logo">
            <span>SUNEF - EFRIS Integrator</span>
        </a>
        <div class="user-profile">
            <div class="user-avatar">JD</div>
            <div class="user-info">
                <div class="user-name">John Doe</div>
                <div class="user-role">Administrator</div>
            </div>
            <a href="users/logout" class="logout-btn" onclick="return confirm('Are you sure you want to logout?');">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </nav>

    <aside class="sidebar">
        <div class="sidebar-menu">
            <div class="menu-title">Main Navigation</div>
            <div class="menu-item">
                <a href="#" class="menu-link active">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="menu-item">
                <details>
                    <summary class="menu-link">
                        <i class="fas fa-users"></i>
                        <span>User Management</span>
                    </summary>
                    <div class="submenu">
                        <a href="#" class="menu-link">
                            <i class="fas fa-user-plus"></i>
                            <span>Add User</span>
                        </a>
                        <a href="#" class="menu-link">
                            <i class="fas fa-list"></i>
                            <span>View Users</span>
                        </a>
                    </div>
                </details>
            </div>
            <div class="menu-title">EFRIS Integration</div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-check-circle"></i>
                    <span>Validate TIN</span>
                </a>
            </div>
            <div class="menu-item">
                <details>
                    <summary class="menu-link">
                        <i class="fas fa-file-invoice"></i>
                        <span>EFRIS Invoices</span>
                        <span class="menu-badge">12</span>
                    </summary>
                    <div class="submenu">
                        <a href="#" class="menu-link">
                            <i class="fas fa-plus"></i>
                            <span>Create Invoice</span>
                        </a>
                        <a href="#" class="menu-link">
                            <i class="fas fa-list-ul"></i>
                            <span>View Invoices</span>
                        </a>
                    </div>
                </details>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Error Log</span>
                    <span class="menu-badge">5</span>
                </a>
            </div>
            <div class="menu-title">Inventory Management</div>
            <div class="menu-item">
                <details>
                    <summary class="menu-link">
                        <i class="fas fa-boxes"></i>
                        <span>Stock Management</span>
                        <span class="menu-badge">3</span>
                    </summary>
                    <div class="submenu">
                        <a href="#" class="menu-link">
                            <i class="fas fa-plus"></i>
                            <span>Add Stock</span>
                        </a>
                        <a href="#" class="menu-link">
                            <i class="fas fa-eye"></i>
                            <span>View Stock</span>
                        </a>
                    </div>
                </details>
            </div>
            <div class="menu-item">
                <details>
                    <summary class="menu-link">
                        <i class="fas fa-upload"></i>
                        <span>Goods Upload</span>
                        <span class="menu-badge">2</span>
                    </summary>
                    <div class="submenu">
                        <a href="#" class="menu-link">
                            <i class="fas fa-file-upload"></i>
                            <span>Upload Goods</span>
                        </a>
                        <a href="#" class="menu-link">
                            <i class="fas fa-list"></i>
                            <span>View Goods</span>
                        </a>
                    </div>
                </details>
            </div>
            <div class="menu-title">System Configuration</div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-shield-alt"></i>
                    <span>Access Rights</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-history"></i>
                    <span>Audit Trail</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </div>
        </div>
        <div class="sidebar-footer">
            <div class="copyright">
                © 2025 <a href="#">FLAXEM</a>
            </div>
            <div class="version">
                v1.4.0
            </div>
        </div>
    </aside>

    <main class="main-content">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <i class="fas fa-file-invoice text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-500">Today's Invoices</h3>
                            <p class="text-2xl font-bold">24</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.1s;">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-500">Successful</h3>
                            <p class="text-2xl font-bold">1,200</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.2s;">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                            <i class="fas fa-exclamation-triangle text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-500">Pending Errors</h3>
                            <p class="text-2xl font-bold">5</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.3s;">
            <div class="p-6">
                <h2 class="text-xl font-bold mb-4">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-4">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">New invoice created #INV-2023-0456</p>
                            <p class="text-xs text-gray-500">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 mr-4">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">New user registered: Sarah Johnson</p>
                            <p class="text-xs text-gray-500">15 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 mr-4">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">EFRIS sync error with invoice #INV-2023-0455</p>
                            <p class="text-xs text-gray-500">1 hour ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.navbar-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
