@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Book Car: {{ $car->name }}</h1>

    <div class="bg-white p-4 rounded shadow mb-4">
        <p><strong>Car:</strong> {{ $car->name }} - {{ $car->brand }} ({{ $car->model }})</p>
        <p><strong>Daily Rent:</strong> ${{ $car->daily_rent_price }}</p>
    </div>

    <form action="{{ route('rentals.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->id }}">

        <div>
            <label for="start_date" class="block font-medium mb-1">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="w-full border border-gray-300 p-2" required>
        </div>
        <div>
            <label for="end_date" class="block font-medium mb-1">End Date</label>
            <input type="date" name="end_date" id="end_date" class="w-full border border-gray-300 p-2" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Confirm Booking</button>
    </form>
@endsection
