<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        //$cars = Car::all();
        $cars = Car::paginate(5);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required',
            'brand'            => 'required',
            'model'            => 'required',
            'year'             => 'required|integer',
            'car_type'         => 'required',
            'daily_rent_price' => 'required|numeric',
            'availability'     => 'required|boolean',
            'image'            => 'nullable|image|max:2048',
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $path               = $request->file('image')->store('car_images', 'public');
            $validated['image'] = $path;
        }

        Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully.');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        // Validate input fields, including optional image
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'brand'            => 'required|string|max:255',
            'model'            => 'required|string|max:255',
            'year'             => 'required|integer',
            'car_type'         => 'required|string|max:255',
            'daily_rent_price' => 'required|numeric',
            'availability'     => 'required|boolean',
            'image'            => 'nullable|image|max:2048', // up to 2MB
        ]);

        // If a new file is uploaded
        if ($request->hasFile('image')) {
            // 1) Delete the old image if it exists
            if ($car->image && Storage::exists('public/' . $car->image)) {
                Storage::delete('public/' . $car->image);
            }

            // 2) Store the new image
            $path = $request->file('image')->store('car_images', 'public');
            // 3) Update the 'image' field in the validated data
            $validated['image'] = $path;
        }

        // Update the car with the validated (and possibly updated) data
        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
