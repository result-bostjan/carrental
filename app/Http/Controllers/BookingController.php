<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index() {
        $bookings = Booking::with('car') // eager load, da se ne dela N+1 query
        ->where('user_id', auth()->id())
        ->orderBy('start_date', 'asc')
        ->get();

        return view('bookings.index', compact('bookings'));
    }
    
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
    
        $totalPrice = $days * $car->price_per_day;

    
        Booking::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
        ]);
    
    
        return redirect()->back()->with('success', 'Booking successful!');
    }

    public function searchForm() {
        return view('bookings.search');
    }

    public function search(Request $request) {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start = $request->start_date;
        $end = $request->end_date;

        // Cars available in the date range
        $cars = Car::where('available', true)
            ->whereDoesntHave('bookings', function ($q) use ($start, $end) {
                $q->where(function ($q2) use ($start, $end) {
                    $q2->whereBetween('start_date', [$start, $end])
                       ->orWhereBetween('end_date', [$start, $end])
                       ->orWhere(function ($q3) use ($start, $end) {
                           $q3->where('start_date', '<=', $start)
                              ->where('end_date', '>=', $end);
                       });
                });
            })->get();

        return view('bookings.results', compact('cars', 'start', 'end'));
    }

    public function book(Request $request, Car $car) {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $days = Carbon::parse($request->end_date)->diffInDays(Carbon::parse($request->start_date)) + 1;
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
        $bookings = auth()->user()->bookings()->with('car')->get();
        return view('bookings.my-bookings', compact('bookings'));
    }

    public function create(Car $car)
    {
        return view('bookings.create', compact('car'));
    }

    public function destroy(Booking $booking)
    {
        // Tukaj se preveri, da rezervacijo lahko briše le lastnik ali admin
        if(auth()->id() !== $booking->user_id && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $booking->delete();

        return redirect()->back()->with('success', 'Booking canceled successfully!');
    }
}
    