@extends('layouts.app')

@section('title', 'Edit Car')

@section('content')
<div class="container mt-5">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Potrebno za update metode --}}
        
        <div class="mb-3">
            <label for="make" class="form-label">Make</label>
            <input type="text" name="make" id="make" class="form-control" value="{{ old('make', $car->make) }}" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $car->model) }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $car->year) }}" required>
        </div>

        <div class="mb-3">
            <label for="price_per_day" class="form-label">Daily Price</label>
            <input type="number" step="0.01" name="price_per_day" id="price_per_day" class="form-control" value="{{ old('price_per_day', $car->price_per_day) }}" required>
        </div>

        <div class="mb-3">
            <label for="available" class="form-label">Available</label>
            <select name="available" id="available" class="form-select" required>
                <option value="1" {{ old('available', $car->available) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('available', $car->available) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Car</button>
        <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection