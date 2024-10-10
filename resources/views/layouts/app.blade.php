<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    @vite('resources/css/app.css') <!-- This will load the TailwindCSS -->
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">

        <!-- Navigation Bar -->
        <nav class="bg-blue-600 p-4 text-white">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="{{ url('/tasks') }}" class="text-lg font-bold">ToDo App</a>

                <div>
                    @auth
                        <span>{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline-block ml-4">
                            @csrf
                            <button type="submit" class="text-white">Logout</button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="ml-4">Login</a>
                        <a href="{{ route('register') }}" class="ml-4">Register</a>
                    @endguest
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white text-center p-4">
            ToDo App © {{ date('Y') }}
        </footer>

    </div>
</body>
</html>
