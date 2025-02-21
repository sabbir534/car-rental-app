<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental Service</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-100">
    <!-- Fixed Top Navigation Bar -->
    <nav class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div>
                <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">
                    Car Rental Service
                </a>
            </div>
            <div class="flex space-x-4 items-center">
                @auth
                    @if (Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600">Admin
                            Dashboard</a>
                    @endif
                    <a href="{{ route('cars.index') }}" class="text-gray-700 hover:text-blue-600">Cars</a>
                    <a href="{{ route('rentals.index') }}" class="text-gray-700 hover:text-blue-600">My Rentals</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-blue-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600">Contact</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600">About</a>
                    <a href="{{ route('cars.index') }}" class="text-gray-700 hover:text-blue-600">Rentals</a>
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content (padded to avoid overlap with fixed top bar) -->
    <div class="pt-20 max-w-7xl mx-auto p-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>

</html>
