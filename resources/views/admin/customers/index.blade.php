@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Manage Customers</h1>

    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">ID</th>
                <th class="px-4 py-2 border-b">Name</th>
                <th class="px-4 py-2 border-b">Email</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $customer->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $customer->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $customer->email }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('admin.customers.show', $customer->id) }}"
                            class="text-blue-600 hover:underline mr-2">View</a>
                        <a href="{{ route('admin.customers.edit', $customer->id) }}"
                            class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Are you sure you want to delete this customer?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
