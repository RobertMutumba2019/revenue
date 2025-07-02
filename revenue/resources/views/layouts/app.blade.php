<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title', 'SUNEF')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- External CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/react@17/umd/react.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-dom@17/umd/react-dom.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/babel-standalone@6.26.0/babel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles -->
    <style type="text/css">
        .form-control { padding: 0.5rem !important; border: none !important; outline: none; }
        .select2, .select3, .select4 { border: none !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }
        .form-line select { padding: 0 !important; }
        .form-group .form-line:after { border: none; }
        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .login-box { animation: fadeIn 1s ease-in-out; }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .input-group { position: relative; transition: all 0.3s ease; }
        .input-group:hover { transform: translateY(-2px); }
        .input-group-addon {
            background: #f1f5f7;
            padding: 0.5rem;
            border-radius: 0.375rem 0 0 0.375rem;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }
        button:hover {
            transform: scale(1.02);
            transition: transform 0.2s ease;
        }
    </style>

    @yield('styles')
</head>
<body>
    @yield('content')

    @yield('scripts')
</body>
</html>
