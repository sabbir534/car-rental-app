<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['user', 'car'])->get();
        return view('admin.rentals.index', compact('rentals'));
    }

    public function edit(Rental $rental)
    {
        // If you want to change start_date, end_date, or status
        return view('admin.rentals.edit', compact('rental'));
    }

    public function update(Request $request, Rental $rental)
    {
        // Update logic
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric',
            'status'     => 'required|string|in:Ongoing,Completed,Canceled',
        ]);

        $rental->update($validated);

        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
