<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the cars.
     */
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new cars.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created car in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'daily_price' => 'required|numeric',
            'available' => 'required|boolean',
        ]);

        Car::create($request->all());
        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully.');
    }

    /**
     * Show the form for editing the specified car.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id); 
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified car in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'daily_price' => 'required|numeric',
            'available' => 'required|boolean',
        ]);

        $car = Car::findOrFail($id); 
        $car->update($validated);
        
        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified cars from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
