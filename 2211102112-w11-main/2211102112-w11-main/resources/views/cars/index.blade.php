@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Car List</h2>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add Car</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Color</th>
                <th>Year</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->merk }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->color }}</td>
                <td>{{ $car->year }}</td>
                <td>Rp {{ number_format($car->price, 0, ',', '.') }}</td>
                <td>
                    @if($car->image)
                        <img src="{{ asset('storage/'.$car->image) }}" alt="Car Image" width="50">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="{{ route('cars.show', $car) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('cars.edit', $car) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this car?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
