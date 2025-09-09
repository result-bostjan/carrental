<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['make', 'model', 'year', 'price_per_day', 'available'];

    public function bookings() 
    { 
        return $this->hasMany(Booking::class); 
    }
}
