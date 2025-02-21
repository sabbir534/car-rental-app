@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Update Rental of {{ $rental->user->name }}</h1>

    <form action="{{ route('admin.rentals.update', $rental->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Rental Start Date -->
        <div>
            <label for="start_date" class="block text-gray-700">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $rental->start_date) }}"
                class="w-full border rounded p-2">
            @error('start_date')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Rental End Date -->
        <div>
            <label for="end_date" class="block text-gray-700">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $rental->end_date) }}"
                class="w-full border rounded p-2">
            @error('end_date')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Total Cost -->
        <div>
            <label for="total_cost" class="block text-gray-700">Total Cost</label>
            <input type="number" step="0.01" name="total_cost" id="total_cost"
                value="{{ old('total_cost', $rental->total_cost) }}" class="w-full border rounded p-2">
            @error('total_cost')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status Dropdown -->
        <div>
            <label for="status" class="block text-gray-700">Status</label>
            <select name="status" id="status" class="w-full border rounded p-2">
                <option value="Ongoing" {{ old('status', $rental->status) == 'Ongoing' ? 'selected' : '' }}>
                    Ongoing
                </option>
                <option value="Completed" {{ old('status', $rental->status) == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>
                <option value="Canceled" {{ old('status', $rental->status) == 'Canceled' ? 'selected' : '' }}>
                    Canceled
                </option>
            </select>
            @error('status')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update Rental
            </button>
        </div>
    </form>
@endsection
