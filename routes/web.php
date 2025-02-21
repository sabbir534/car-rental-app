<?php

use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController as FrontendRentalController;
use Illuminate\Support\Facades\Route;

// Public Frontend Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Car browsing routes
Route::get('/cars', [FrontendCarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [FrontendCarController::class, 'show'])->name('cars.show');

// Auth routes (provided by Breeze)
require __DIR__ . '/auth.php';

// Protected Frontend Routes (only logged in users)
Route::middleware('auth')->group(function () {
    // Rentals
    Route::get('/rentals', [FrontendRentalController::class, 'index'])->name('rentals.index');
    Route::get('/rentals/create/{carId}', [FrontendRentalController::class, 'create'])->name('rentals.create');
    Route::post('/rentals', [FrontendRentalController::class, 'store'])->name('rentals.store');
    Route::delete('/rentals/{rental}', [FrontendRentalController::class, 'destroy'])->name('rentals.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard example route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Car CRUD
    Route::resource('cars', AdminCarController::class);

    // Rentals CRUD
    Route::resource('rentals', AdminRentalController::class)->except(['create', 'store', 'show']);

    // Customers
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
