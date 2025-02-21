@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add New Car</h1>

    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block font-medium mb-1">Car Name</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2" required>
        </div>
        <div>
            <label for="brand" class="block font-medium mb-1">Brand</label>
            <input type="text" name="brand" id="brand" class="w-full border border-gray-300 p-2" required>
        </div>
        <div>
            <label for="model" class="block font-medium mb-1">Model</label>
            <input type="text" name="model" id="model" class="w-full border border-gray-300 p-2" required>
        </div>
        <div>
            <label for="year" class="block font-medium mb-1">Year of Manufacture</label>
            <input type="number" name="year" id="year" class="w-full border border-gray-300 p-2" required>
        </div>
        <div>
            <label for="car_type" class="block font-medium mb-1">Car Type</label>
            <input type="text" name="car_type" id="car_type" class="w-full border border-gray-300 p-2" required>
        </div>
        <div>
            <label for="daily_rent_price" class="block font-medium mb-1">Daily Rent Price</label>
            <input type="number" step="0.01" name="daily_rent_price" id="daily_rent_price"
                class="w-full border border-gray-300 p-2" required>
        </div>
        <div>
            <label for="availability" class="block font-medium mb-1">Availability</label>
            <select name="availability" id="availability" class="w-full border border-gray-300 p-2" required>
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
        </div>
        <div>
            <label for="image" class="block font-medium mb-1">Car Image (optional)</label>
            <input type="file" name="image" id="image" class="w-full border border-gray-300 p-2">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>
@endsection
