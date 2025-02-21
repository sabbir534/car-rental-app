@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('heroimage.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto h-full flex flex-col justify-center items-center relative">
            <h1 class="text-4xl md:text-5xl text-white font-bold">Welcome to Car Rental Service</h1>
            <p class="text-lg md:text-xl text-gray-200 mt-4">Find the perfect car for your journey</p>
            <a href="{{ route('cars.index') }}" class="mt-6 px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                Browse Cars
            </a>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="container mx-auto py-10">
        <h2 class="text-3xl font-bold mb-6 text-center">Featured Cars</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($cars as $car)
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
            @endforeach
        </div>
    </section>
@endsection
