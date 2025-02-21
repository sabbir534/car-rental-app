@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Welcome to the Admin Dashboard</h1>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Total Cars -->
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-gray-700 font-semibold">Total Cars</h2>
            <p class="text-3xl mt-2">{{ $totalCars }}</p>
        </div>

        <!-- Available Cars -->
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-gray-700 font-semibold">Available Cars</h2>
            <p class="text-3xl mt-2">{{ $availableCars }}</p>
        </div>

        <!-- Total Rentals -->
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-gray-700 font-semibold">Total Rentals</h2>
            <p class="text-3xl mt-2">{{ $totalRentals }}</p>
        </div>

        <!-- Total Earnings -->
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-gray-700 font-semibold">Total Earnings</h2>
            <p class="text-3xl mt-2">${{ number_format($totalEarnings, 2) }}</p>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-xl font-bold mb-2">Quick Actions</h2>
        <div class="space-x-4">
            <a href="{{ route('admin.cars.index') }}"
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Manage Cars
            </a>
            <a href="{{ route('admin.rentals.index') }}"
                class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Manage Rentals
            </a>
            <a href="{{ route('admin.customers.index') }}"
                class="inline-block px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">
                Manage Customers
            </a>
        </div>
    </div>
@endsection
