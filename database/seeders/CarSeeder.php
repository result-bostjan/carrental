<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create(['make' => 'Toyota', 'model' => 'Corolla', 'year' => 2020, 'price_per_day' => 50, 'available' => true]);
        Car::create(['make' => 'Honda', 'model' => 'Civic', 'year' => 2019, 'price_per_day' => 45, 'available' => true]);
        Car::create(['make' => 'BMW', 'model' => '3 Series', 'year' => 2021, 'price_per_day' => 80, 'available' => true]);
        Car::create(['make' => 'Audi', 'model' => 'A4', 'year' => 2018, 'price_per_day' => 70, 'available' => true]);
        Car::create(['make' => 'Ford', 'model' => 'Focus', 'year' => 2022, 'price_per_day' => 55, 'available' => true]);
    }
}
