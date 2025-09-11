<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index() {
        $bookings = Booking::with('car') 
        ->where('user_id', auth()->id())
        ->orderBy('start_date', 'asc')
        ->get();

        return view('bookings.index', compact('bookings'));
    }
    
    /**
     * store newly defined booking.
     */
    public function store(Request $request) {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $car = Car::findOrFail($request->car_id);

        // Izračun števila dni (+1, da vključi tudi prvi dan)
        $start = Carbon::parse($request->start_date)->startOfDay();
        $end = Carbon::parse($request->end_date)->startOfDay();

        $days = $start->diffInDays($end) + 1; 
    
        $totalPrice = $days * $car->daily_price;

    
        Booking::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
        ]);
    
    
        return redirect()->route('bookings.index')->with('success', 'Booking successful!');
    }

    
    /**
     * Display a listing of the cars.
     */
    public function book(Request $request, Car $car) {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

         // Izračun števila dni (+1, da vključi tudi prvi dan)
        $start = Carbon::parse($request->start_date)->startOfDay();
        $end = Carbon::parse($request->end_date)->startOfDay();

        $days = $start->diffInDays($end) + 1; 
    
        $totalPrice = $days * $car->daily_price;

        Booking::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('bookings.my')->with('success', 'Booking confirmed!');
    }

    public function myBookings() {
        $bookings = auth()->user()->bookings()->with('car')->orderBy('start_date', 'asc')->get();
        return view('bookings.my-bookings', compact('bookings'));
    }

    public function create(Car $car)
    {
        return view('bookings.create', compact('car'));
    }

    /**
     * delete a booking from list.
     */
    public function destroy(Booking $booking)
    {
        // Tukaj se preveri, da rezervacijo lahko briše le lastnik ali admin
        if(auth()->id() !== $booking->user_id && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $booking->delete();

        return redirect()->route('bookings.my')->with('success', 'Booking canceled successfully!');
    }
}
    