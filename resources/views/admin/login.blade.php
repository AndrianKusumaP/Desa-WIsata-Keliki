<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f7fa;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .login-container .icon {
            font-size: 50px;
            color: #008100;
            margin-bottom: 20px;
        }

        .login-container h2 {
            margin: 0;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container button {
            background-color: #008100;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Desa Wisata Keliki</h1>
        <div class="login-container">
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <h2>Sign In</h2>
            @if (session('success'))
                <div style="color: green;">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div style="color: red;">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <input type="text" name="username" placeholder="Username" id="username" autofocus required>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
