<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class BookingController extends Controller
{
    public function index() {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        Booking::create([
            'user_id' => auth()->id(),
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
    
        return redirect()->back()->with('success', 'Booking successful!');
    }
    
    public function myBookings() {
        $bookings = auth()->user()->bookings;
        return view('bookings.index', compact('bookings'));
    }
}
