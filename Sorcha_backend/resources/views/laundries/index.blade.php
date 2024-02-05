<!-- resources/views/laundries/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1   style="text-align: center">Laundry Proggress </h1>

    <a href="{{ route('laundries.create') }}" class="btn btn-primary">Create Laundry</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Shop ID</th>
                <th>Weight</th>
                <th>Pickup Address</th>
                <th>Delivery Address</th>
                <th>Total</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laundries as $laundry)
                <tr>
                    <td>{{ $laundry->id }}</td>
                    <td>{{ $laundry->user_id }}</td>
                    <td>{{ $laundry->shop_id }}</td>
                    <td>{{ $laundry->weight }}</td>
                    <td>{{ $laundry->pickup_address }}</td>
                    <td>{{ $laundry->delivery_address }}</td>
                    <td>{{ $laundry->total }}</td>
                    <td>{{ $laundry->description }}</td>
                    <td>{{ $laundry->status }}</td>
                    <td>
                        <a href="{{ route('laundries.edit', $laundry->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('laundries.destroy', $laundry->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $laundry->id }}').submit();">Delete</a>
                        <form id="delete-form-{{ $laundry->id }}" action="{{ route('laundries.destroy', $laundry->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
