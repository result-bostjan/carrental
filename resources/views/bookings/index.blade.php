@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
<a href="/" class="btn btn-success mb-3">Add Bookings</a>
<a href="{{ route('bookings.my') }}" class="btn btn-success mb-3">Cancel Bookings</a>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Car</th><th>From</th><th>To</th><th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->car->make }} {{ $booking->car->model }}</td>
                <td>{{ $booking->start_date }}</td>
                <td>{{ $booking->end_date }}</td>
                <td>${{ $booking->total_price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
