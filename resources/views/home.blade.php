@extends('layouts.app')

@section('title', 'Available Cars')

@section('content')
<div class="row">
    @foreach($cars as $car)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->make }} {{ $car->model }}</h5>
                    <p>{{ $car->year }} – ${{ $car->daily_price }} / day</p>
                    <a href="{{ route('bookings.create', $car->id) }}" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

