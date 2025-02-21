@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Browse Cars</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('cars.index') }}" class="mb-4 flex flex-wrap gap-4 items-end">
        <div>
            <label for="car_type" class="block font-medium mb-1">Car Type</label>
            <input type="text" name="car_type" id="car_type" value="{{ request('car_type') }}"
                placeholder="SUV, Sedan, etc." class="border rounded p-2">
        </div>
        <div>
            <label for="brand" class="block font-medium mb-1">Brand</label>
            <input type="text" name="brand" id="brand" value="{{ request('brand') }}"
                placeholder="Toyota, Ford, etc." class="border rounded p-2">
        </div>
        <div>
            <label for="price_min" class="block font-medium mb-1">Min Price</label>
            <input type="number" step="0.01" name="price_min" id="price_min" value="{{ request('price_min') }}"
                class="border rounded p-2">
        </div>
        <div>
            <label for="price_max" class="block font-medium mb-1">Max Price</label>
            <input type="number" step="0.01" name="price_max" id="price_max" value="{{ request('price_max') }}"
                class="border rounded p-2">
        </div>
        <div class="flex gap-2">
            <!-- Filter Button -->
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Filter
            </button>
            <!-- Clear Button: Link resets the form by going to the route without query parameters -->
            <a href="{{ route('cars.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Clear
            </a>
        </div>
    </form>

    <!-- Car Grid Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($cars as $car)
            <div class="relative bg-white shadow-lg rounded overflow-hidden">
                @if ($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                        class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif

                <div class="p-4">
                    <h3 class="text-xl font-semibold">{{ $car->name }}</h3>
                    <p class="text-gray-600">{{ $car->brand }}</p>
                    <p class="mt-2 text-gray-800 font-bold">${{ number_format($car->daily_rent_price, 2) }} / day</p>
                </div>

                @if ($car->availability)
                    <!-- If available, the entire card is clickable -->
                    <a href="{{ route('cars.show', $car->id) }}" class="absolute inset-0 z-10"></a>
                @else
                    <!-- If not available, display an overlay indicating unavailability -->
                    <div class="absolute inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center z-10">
                        <span class="text-white text-xl font-bold">Not Available</span>
                    </div>
                @endif
            </div>
        @empty
            <p class="col-span-3">No cars found.</p>
        @endforelse
    </div>

    <!-- Pagination Links (if applicable) -->
    <div class="mt-4">
        {{ $cars->links() }}
    </div>
@endsection
