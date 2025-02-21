@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Customer: {{ $customer->name }}</h1>

    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block font-medium mb-1">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}"
                class="w-full border border-gray-300 p-2" required>
            @error('name')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email" class="block font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}"
                class="w-full border border-gray-300 p-2" required>
            @error('email')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="phone" class="block font-medium mb-1">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}"
                class="w-full border border-gray-300 p-2">
            @error('phone')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="address" class="block font-medium mb-1">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $customer->address) }}"
                class="w-full border border-gray-300 p-2">
            @error('address')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update
            </button>
            <!-- Back Button -->
            <a href="{{ route('admin.customers.index') }}"
                class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Back to Customers
            </a>
        </div>
    </form>
@endsection
