<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
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

</body>
</html>
