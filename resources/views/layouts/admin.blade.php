<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - {{ config('app.name', 'Car Rental Service') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4 justify-center">
                <h2 class="text-lg font-bold mb-4">Manage Records</h2>
                <nav class="space-y-2">
                    <!-- Dashboard Link -->
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ request()->routeIs('admin.dashboard') ? 'block px-4 py-2 rounded bg-blue-700 text-white font-bold' : 'block px-4 py-2 rounded hover:bg-blue-700' }}">
                        Back to Dashboard
                    </a>
                    <!-- Manage Cars Link -->
                    <a href="{{ route('admin.cars.index') }}"
                        class="{{ request()->routeIs('admin.cars.*') ? 'block px-4 py-2 rounded bg-gray-700 text-white font-bold' : 'block px-4 py-2 rounded hover:bg-gray-700' }}">
                        Manage Cars
                    </a>
                    <!-- Manage Rentals Link -->
                    <a href="{{ route('admin.rentals.index') }}"
                        class="{{ request()->routeIs('admin.rentals.*') ? 'block px-4 py-2 rounded bg-gray-700 text-white font-bold' : 'block px-4 py-2 rounded hover:bg-gray-700' }}">
                        Manage Rentals
                    </a>
                    <!-- Manage Customers Link -->
                    <a href="{{ route('admin.customers.index') }}"
                        class="{{ request()->routeIs('admin.customers.*') ? 'block px-4 py-2 rounded bg-gray-700 text-white font-bold' : 'block px-4 py-2 rounded hover:bg-gray-700' }}">
                        Manage Customers
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>

</html>
