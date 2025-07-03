<!-- resources/views/reset-password.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reset Your Password - SUNEF</title>
    <style>
        /* Reset */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        .container {
            background: #fff;
            max-width: 420px;
            width: 90%;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 30px 40px;
            text-align: center;
        }
        .header {
            background-color: #0056b3;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            color: white;
            font-weight: 700;
            font-size: 1.6rem;
            margin: -30px -40px 30px -40px;
        }
        form {
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }
        input[type="password"],
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1.8px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="password"]:focus,
        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #0056b3;
            box-shadow: 0 0 6px #0056b3aa;
        }
        input[readonly] {
            background-color: #eee;
            cursor: not-allowed;
        }
        button {
            width: 100%;
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 14px 0;
            font-size: 1.1rem;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #003f82;
        }
        .footer {
            margin-top: 25px;
            font-size: 0.9rem;
            color: #666;
            text-align: center;
        }
        /* Responsive */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }
            .header {
                font-size: 1.3rem;
                padding: 15px;
                margin: -20px -20px 20px -20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Reset Your SUNEF Password
        </div>

        <form method="POST" action="/reset-password">
            @csrf
            <input type="hidden" name="token" value="{{ request('token') }}">
            <input type="hidden" name="email" value="{{ request('email') }}">

            {{-- <label>Username</label>
            <input type="text" name="username" value="{{ old('username', $username ?? '') }}" readonly /> --}}

            <label>New Password</label>
            <input type="password" name="password" placeholder="Enter new password" required />

            <label>Confirm New Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm new password" required />

            <button type="submit">Reset Password</button>
        </form>

        <div class="footer">
            <small>If you did not request a password reset, please ignore this email.</small>
        </div>
    </div>
</body>
</html>
