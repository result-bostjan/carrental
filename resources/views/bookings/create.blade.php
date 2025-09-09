@extends('layouts.app')

@section('title', 'Book Car')

@section('content')
<form action="{{ route('bookings.store') }}" method="POST">
    @csrf
    <input type="hidden" name="car_id" value="{{ $car->id }}">

    <div class="mb-3">
        <label>Start Date</label>
        <input type="date" name="start_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>End Date</label>
        <input type="date" name="end_date" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Confirm Booking</button>
</form>
@endsection

