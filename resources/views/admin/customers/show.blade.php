@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Customer: {{ $customer->name }}</h1>

    <div class="bg-white p-4 rounded shadow mb-6">
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone ?? 'N/A' }}</p>
        <p><strong>Address:</strong> {{ $customer->address ?? 'N/A' }}</p>
    </div>

    <h2 class="text-xl font-semibold mb-2">Rental History</h2>
    <table class="min-w-full bg-white shadow rounded mb-6">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-2 border-b text-left">Rental ID</th>
                <th class="px-4 py-2 border-b text-left">Car</th>
                <th class="px-4 py-2 border-b text-left">Start Date</th>
                <th class="px-4 py-2 border-b text-left">End Date</th>
                <th class="px-4 py-2 border-b text-left">Total Cost</th>
                <th class="px-4 py-2 border-b text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $rental->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $rental->car->name }} - {{ $rental->car->brand }}</td>
                    <td class="px-4 py-2 border-b">{{ $rental->start_date }}</td>
                    <td class="px-4 py-2 border-b">{{ $rental->end_date }}</td>
                    <td class="px-4 py-2 border-b">${{ number_format($rental->total_cost, 2) }}</td>
                    <td class="px-4 py-2 border-b">{{ $rental->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Back Button -->
    <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
        Back to Customers
    </a>
@endsection
