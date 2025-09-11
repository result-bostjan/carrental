@extends('layouts.app')

@section('title', 'Manage Cars')

@section('content')
<a href="{{ route('admin.cars.create') }}" class="btn btn-success mb-3">Add Car</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Make</th><th>Model</th><th>Year</th><th>Price</th><th>Available</th><th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->make }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>${{ $car->daily_price }}</td>
                <td>{{ $car->available ? 'YES' : 'NO' }}</td>
                <td>
                    <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
