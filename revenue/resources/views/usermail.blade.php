<!DOCTYPE html>
<html>
<head>
    <title>Your New Account Credentials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .credentials {
            background-color: #e9e9e9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }
        .credentials p {
            margin: 5px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Welcome to SUNEF!</h2>
        </div>
        <div class="content">
            <p>Dear User,</p>
            <p>Your account has been successfully created. Here are your login credentials:</p>
            <div class="credentials">
                <p><strong>Username:</strong> {{ $username }}</p>
                <p><strong>Password:</strong> {{ $password }}</p>
            </div>
            <p>Please log in and consider changing your password for security reasons.</p>
            <p>Thank you,</p>
            <p>The SUNEF Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} SUNEF. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

