<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset & basics */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            min-height: 100vh;
            background: #f4f6f8;
        }
        /* Sidebar styles */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            position: fixed;
            height: 100vh;
        }
        .sidebar a, .sidebar button {
            display: flex;
            align-items: center;
            color: #ecf0f1;
            text-decoration: none;
            padding: 12px 20px;
            border: none;
            background: none;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            outline: none;
            border-left: 4px solid transparent;
            transition: background-color 0.2s, border-color 0.2s;
        }
        .sidebar a:hover, .sidebar button:hover {
            background-color: #34495e;
            border-left: 4px solid #e74c3c;
        }
        .sidebar a .icon, .sidebar button .icon {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }
        .sidebar .dropdown-btn {
            justify-content: space-between;
        }
        .sidebar .dropdown-container {
            display: none;
            flex-direction: column;
            padding-left: 20px;
            background-color: #34495e;
        }
        .sidebar .dropdown-container a {
            padding: 10px 20px;
            font-size: 14px;
            border-left: none;
        }
        .sidebar .dropdown-container a:hover {
            background-color: #3b5771;
            border-left: 4px solid #e74c3c;
        }

        /* Main content styles */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }

        /* Dashboard styles (your original) */
        .block-header h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .info-box {
            flex: 1 1 calc(25% - 20px);
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: 10px;
            color: white;
            min-width: 250px;
        }
        .info-box .icon {
            font-size: 2em;
            margin-right: 15px;
        }
        .info-box .content .text {
            font-size: 14px;
            text-transform: uppercase;
        }
        .info-box .content .number {
            font-size: 24px;
            font-weight: bold;
        }
        .bg-light-green { background-color: #8BC34A; }
        .bg-purple { background-color: #9C27B0; }
        .bg-orange { background-color: #FF9800; }
        .bg-pink { background-color: #E91E63; }
        .stat-section {
            margin-top: 40px;
        }
        table td {
            padding: 8px 12px;
        }
        table td.divider {
            width: 10px;
            background-color: #E4E4E8;
        }
    </style>
</head>
<body>

    <nav class="sidebar">
        <a href="/admind">
            <span class="icon"><i class="fas fa-tachometer-alt"></i></span> Dashboard
        </a>

        <button class="dropdown-btn">
            <span><span class="icon"><i class="fas fa-users-cog"></i></span> Manage Users</span>
            <i class="fas fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/users/add"><i class="fas fa-user-plus"></i> Add Users</a>
            <a href="/users/delete"><i class="fas fa-user-minus"></i> Delete Users</a>
        </div>

        <a href="/settings">
            <span class="icon"><i class="fas fa-cogs"></i></span> Settings
        </a>

        <a href="/logout">
            <span class="icon"><i class="fas fa-sign-out-alt"></i></span> Logout
        </a>
    </nav>

    <main class="main-content">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <div class="row">
            <div class="info-box bg-light-green">
                <div class="icon"><i class="fa fa-suitcase"></i></div>
                <div class="content">
                    <div class="text">EFRIS GOODS</div>
                    <div class="number">0</div>
                </div>
            </div>

            <div class="info-box bg-purple">
                <div class="icon"><i class="fa fa-list"></i></div>
                <div class="content">
                    <div class="text">EFRIS INVOICES</div>
                    <div class="number">0</div>
                </div>
            </div>

            <div class="info-box bg-orange">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="content">
                    <div class="text">REGISTERED USERS</div>
                    <div class="number">0</div>
                </div>
            </div>

            <div class="info-box bg-pink">
                <div class="icon"><i class="fa fa-circle"></i></div>
                <div class="content">
                    <div class="text">ONLINE USERS</div>
                    <div class="number">0</div>
                </div>
            </div>
        </div>

        <div class="stat-section">
            <h3>EFRIS Uploaded Invoices</h3>
            <table border="0">
                <tr>
                    <td>Today:</td>
                    <td>0</td>
                    <td class="divider"></td>
                    <td>Yesterday:</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>This Week:</td>
                    <td>0</td>
                    <td class="divider"></td>
                    <td>Last Week:</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>This Month:</td>
                    <td>0</td>
                    <td class="divider"></td>
                    <td>Last Month:</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>This Year:</td>
                    <td>0</td>
                    <td class="divider"></td>
                    <td>Last Year:</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
    </main>

<script>
    // Dropdown toggle
    const dropdownBtns = document.querySelectorAll('.dropdown-btn');
    dropdownBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const dropdown = btn.nextElementSibling;
            dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
            btn.querySelector('i.fas.fa-caret-down').classList.toggle('fa-rotate-180');
        });
    });
</script>

</body>
</html>
