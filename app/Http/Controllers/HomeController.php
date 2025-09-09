<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::all(); // pridobi vse avte iz baze
        return view('home', compact('cars'));
    }
}
