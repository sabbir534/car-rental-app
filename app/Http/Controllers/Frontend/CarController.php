<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::where('availability', true);

        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }
        if ($request->filled('price_min') && is_numeric($request->price_min)) {
            $query->where('daily_rent_price', '>=', $request->price_min);
        }
        if ($request->filled('price_max') && is_numeric($request->price_max)) {
            $query->where('daily_rent_price', '<=', $request->price_max);
        }

        $cars = $query->paginate(8);

        return view('frontend.cars.index', compact('cars'));
    }

    public function show(Car $car)
    {
        // Show car details
        return view('frontend.cars.show', compact('car'));
    }
}
