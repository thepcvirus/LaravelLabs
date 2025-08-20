<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color:#ccc;" class="antialiased">
    <nav class="bg-gradient-to-r from-gray-900 to-gray-700 shadow-lg">
        <div class="container mx-auto flex justify-between items-center py-3 px-4">
            <div class="flex items-center space-x-8">
                <span class="text-green-400 font-extrabold text-2xl tracking-wide">MyApp</span>
                <a href="{{ url('/') }}" class="text-gray-900 hover:bg-gray-200 hover:text-green-600 transition-colors duration-200 font-semibold px-5 py-2 rounded-lg">Home</a>
                <a href="{{ route('posts.create') }}" class="text-gray-900 hover:bg-gray-200 hover:text-green-600 transition-colors duration-200 font-semibold px-5 py-2 rounded-lg">Create</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
    <footer class="mt-8 text-center">
        <p class="text-gray-600">© 2025 My App. All rights reserved.</p>
</body>
</html>
