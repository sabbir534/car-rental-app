<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;

class PageController extends Controller
{
    public function home()
    {
        // Fetch a set of featured cars.
        // For example, get the 8 most recently added cars.
        $cars = Car::orderBy('created_at', 'desc')->take(8)->get();

        // Alternatively, you might want to fetch random cars:
        // $cars = Car::inRandomOrder()->take(8)->get();

        return view('frontend.home', compact('cars'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
