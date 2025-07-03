<!-- resources/views/reset-password.blade.php -->

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
            <h2>Reset SUNEF!</h2>
        </div>
<form method="POST" action="/reset-password">
    @csrf
    <input type="hidden" name="token" value="{{ request('token') }}">
    <input type="hidden" name="email" value="{{ request('email') }}">

    <label>New Password:</label>
    <input type="password" name="password" required>

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Reset Password</button>
</form>
</body>
</html>

