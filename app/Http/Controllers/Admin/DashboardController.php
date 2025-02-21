<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;

class DashboardController extends Controller
{
    /**
     * Display an overview of statistics on the admin dashboard.
     */
    public function index()
    {
        // Fetch required statistics
        $totalCars     = Car::count();
        $availableCars = Car::where('availability', true)->count();
        $totalRentals  = Rental::count();
        $totalEarnings = Rental::sum('total_cost');

        // Return the admin dashboard view with the data
        return view('admin.dashboard', compact(
            'totalCars',
            'availableCars',
            'totalRentals',
            'totalEarnings'
        ));
    }
}
