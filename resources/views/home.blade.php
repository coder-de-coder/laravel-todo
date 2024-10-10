<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Landing Page</title>
</head>
<body>
    <h1>Welcome to Your ToDo Application!</h1>
    <p>Please use the navigation to manage your tasks.</p>
    @auth
        <p>Welcome, {{ auth()->user()->name }}!</p>
        <a href="{{ route('tasks.index') }}">Go to Tasks</a>
    @else
        <p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a></p>
    @endauth
</body>
</html>
