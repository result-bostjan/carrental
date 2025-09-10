<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;

Route::get('/', [HomeController::class, 'index']);

require __DIR__.'/auth.php';

Route::get('/dashboard', [HomeController::class, 'index'])
     ->middleware(['auth', 'verified'])
     ->name('dashboard');

// Admin routes
Route::middleware(['auth'])
     ->prefix('admin')
     ->group(function () {
         Route::resource('cars', CarController::class)->names('admin.cars');
     });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('bookings/search', [BookingController::class, 'searchForm'])->name('bookings.searchForm');
    Route::post('bookings/search', [BookingController::class, 'search'])->name('bookings.search');
    Route::post('bookings/{car}', [BookingController::class, 'book'])->name('bookings.book');
    Route::get('my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create/{car}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/my', [BookingController::class, 'myBookings'])->name('bookings.my');
    Route::delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});


