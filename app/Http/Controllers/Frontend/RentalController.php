<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    public function index()
    {
        // Show all rentals for the current user
        $rentals = Auth::user()->rentals()->with('car')->get();
        return view('frontend.rentals.index', compact('rentals'));
    }

    public function create($carId)
    {
        $car = Car::findOrFail($carId);
        return view('frontend.rentals.create', compact('car'));
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'car_id'     => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $car = Car::findOrFail($request->car_id);

        // Check availability if needed (for advanced scenarios,
        // you'd do a deeper check if the car has overlapping rentals).
        if (! $car->availability) {
            return redirect()->back()->withErrors('Car is not available.');
        }

        // Calculate total cost based on daily rent price and date range
        $start     = strtotime($request->start_date);
        $end       = strtotime($request->end_date);
        $days      = ($end - $start) / 60 / 60 / 24 + 1; // inclusive
        $totalCost = $days * $car->daily_rent_price;

        $rental = Rental::create([
            'user_id'    => Auth::id(),
            'car_id'     => $car->id,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'total_cost' => $totalCost,
        ]);

        // Send emails (to user and admin)
        $this->sendEmailNotifications($rental);

        return redirect()->route('rentals.index')->with('success', 'Car booked successfully.');
    }

    public function destroy(Rental $rental)
    {
        // User can only cancel if the rental hasn't started yet
        if (strtotime($rental->start_date) > time()) {
            $rental->delete();
            return redirect()->route('rentals.index')->with('success', 'Booking canceled successfully.');
        }

        return redirect()->route('rentals.index')->withErrors('Cannot cancel a rental that has already started.');
    }

    private function sendEmailNotifications(Rental $rental)
    {
        // Example:
        $user = $rental->user;
        $car  = $rental->car;

        // Send email to the customer
        Mail::raw(
            "Thank you for renting {$car->name}. Your rental is confirmed from {$rental->start_date} to {$rental->end_date}.",
            function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Your Car Rental Confirmation');
            }
        );

        // Send email to admin
        Mail::raw(
            "Car Rental Notification: {$user->name} has rented {$car->name}.",
            function ($message) {
                $message->to('admin@example.com')
                    ->subject('Car Rented');
            }
        );
    }
}
