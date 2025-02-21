@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Manage Cars</h1>

    <!-- Button to add new car -->
    <a href="{{ route('admin.cars.create') }}"
        class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Add New Car
    </a>

    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-2 border-b text-left">ID</th>
                <th class="px-4 py-2 border-b text-left">Image</th>
                <th class="px-4 py-2 border-b text-left">Name</th>
                <th class="px-4 py-2 border-b text-left">Brand</th>
                <th class="px-4 py-2 border-b text-left">Daily Rent Price</th>
                <th class="px-4 py-2 border-b text-left">Availability</th>
                <th class="px-4 py-2 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cars as $car)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $car->id }}</td>
                    <td class="px-4 py-2 border-b">
                        @if ($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                                class="h-16 w-32 object-cover rounded">
                        @else
                            <span class="text-gray-500">No image</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border-b">{{ $car->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $car->brand }}</td>
                    <td class="px-4 py-2 border-b">
                        ${{ number_format($car->daily_rent_price, 2) }}
                    </td>
                    <td class="px-4 py-2 border-b">
                        @if ($car->availability)
                            <span class="text-green-600">Available</span>
                        @else
                            <span class="text-red-600">Not Available</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="text-blue-600 hover:underline mr-2">
                            Edit
                        </a>
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Are you sure you want to delete this car?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-2 border-b text-center">
                        No cars found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $cars->links() }}
    </div>
@endsection
