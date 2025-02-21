@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Manage Rentals</h1>

    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-2 border-b text-left">Rental ID</th>
                <th class="px-4 py-2 border-b text-left">Customer Name</th>
                <th class="px-4 py-2 border-b text-left">Car Details</th>
                <th class="px-4 py-2 border-b text-left">Start Date</th>
                <th class="px-4 py-2 border-b text-left">End Date</th>
                <th class="px-4 py-2 border-b text-left">Total Cost</th>
                <th class="px-4 py-2 border-b text-left">Status</th>
                <th class="px-4 py-2 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $rental->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $rental->user->name }}</td>
                    <td class="px-4 py-2 border-b">
                        {{ $rental->car->name }} - {{ $rental->car->brand }}
                    </td>
                    <td class="px-4 py-2 border-b">{{ $rental->start_date }}</td>
                    <td class="px-4 py-2 border-b">{{ $rental->end_date }}</td>
                    <td class="px-4 py-2 border-b">
                        ${{ number_format($rental->total_cost, 2) }}
                    </td>
                    <td class="px-4 py-2 border-b">{{ $rental->status }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('admin.rentals.edit', $rental->id) }}"
                            class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this rental?')"
                                class="text-red-600 hover:underline ml-2">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
