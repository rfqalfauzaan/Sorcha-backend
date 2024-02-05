<!-- resources/views/laundries/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Laundry</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('laundries.update', $laundry->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" class="form-control" value="{{ $laundry->user_id }}" required>
        </div>

        <div class="form-group">
            <label for="shop_id">Shop ID:</label>
            <input type="text" name="shop_id" class="form-control" value="{{ $laundry->shop_id }}" required>
        </div>

        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="text" name="weight" class="form-control" value="{{ $laundry->weight }}" required>
        </div>

        <div class="form-group">
            <label for="pickup_address">Pickup Address:</label>
            <textarea name="pickup_address" class="form-control">{{ $laundry->pickup_address }}</textarea>
        </div>

        <div class="form-group">
            <label for="delivery_address">Delivery Address:</label>
            <textarea name="delivery_address" class="form-control">{{ $laundry->delivery_address }}</textarea>
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" name="total" class="form-control" value="{{ $laundry->total }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control">{{ $laundry->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" value="{{ $laundry->status }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
