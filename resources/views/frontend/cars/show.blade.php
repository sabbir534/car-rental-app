@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $car->name }}</h1>

        <!-- Car Image -->
        <div class="mb-6">
            @if ($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                    class="w-full h-auto object-cover rounded">
            @else
                <div class="w-full bg-gray-200 h-64 flex items-center justify-center rounded">
                    <span class="text-gray-500">No Image Available</span>
                </div>
            @endif
        </div>

        <!-- Car Details Table -->
        <div class="overflow-x-auto mb-6">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Brand</th>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $car->brand }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Model</th>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $car->model }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Year</th>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $car->year }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Car Type</th>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $car->car_type }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Daily Rent Price</th>
                        <td class="px-6 py-4 text-sm text-gray-900">${{ number_format($car->daily_rent_price, 2) }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Availability</th>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            @if ($car->availability)
                                <span class="text-green-600 font-semibold">Available</span>
                            @else
                                <span class="text-red-600 font-semibold">Not Available</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Book Now and Back Button Side by Side -->
        <div class="flex items-center space-x-4 mb-6">
            <div>
                @if ($car->availability)
                    <a href="{{ route('rentals.create', $car->id) }}"
                        class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                        Book Now
                    </a>
                @else
                    <div class="inline-block px-6 py-3 bg-red-200 text-red-600 font-bold text-lg rounded">
                        Not Available
                    </div>
                @endif
            </div>
            <div>
                <a href="{{ route('cars.index') }}"
                    class="inline-block px-6 py-3 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Back to Cars
                </a>
            </div>
        </div>
    </div>
@endsection
