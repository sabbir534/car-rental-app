@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">My Rentals</h1>

    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">ID</th>
                <th class="px-4 py-2 border-b">Car</th>
                <th class="px-4 py-2 border-b">Start Date</th>
                <th class="px-4 py-2 border-b">End Date</th>
                <th class="px-4 py-2 border-b">Total Cost</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rentals as $rental)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $rental->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                    <td class="px-4 py-2 border-b">{{ $rental->start_date }}</td>
                    <td class="px-4 py-2 border-b">{{ $rental->end_date }}</td>
                    <td class="px-4 py-2 border-b">${{ $rental->total_cost }}</td>
                    <td class="px-4 py-2 border-b">
                        @if (\Carbon\Carbon::parse($rental->start_date)->isFuture())
                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure you want to cancel this booking?')">
                                    Cancel
                                </button>
                            </form>
                        @else
                            <span class="text-gray-500">Rental started/ended</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-2 border-b">No rentals found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
