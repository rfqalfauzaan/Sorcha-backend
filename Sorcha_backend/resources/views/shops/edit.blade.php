<!-- resources/views/shops/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Shop</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shops.update', $shop->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="text" name="image" class="form-control" value="{{ $shop->image }}" required>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $shop->name }}" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" value="{{ $shop->location }}" required>
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" class="form-control" value="{{ $shop->city }}" required>
        </div>

        <div class="form-group">
            <label for="delivery">Delivery:</label>
            <input type="checkbox" name="delivery" value="1" {{ $shop->delivery ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="pickup">Pickup:</label>
            <input type="checkbox" name="pickup" value="1" {{ $shop->pickup ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="whatsapp">WhatsApp:</label>
            <input type="text" name="whatsapp" class="form-control" value="{{ $shop->whatsapp }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required>{{ $shop->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" value="{{ $shop->price }}" required>
        </div>

        <div class="form-group">
            <label for="rate">Rate:</label>
            <input type="number" name="rate" class="form-control" value="{{ $shop->rate }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
