<!-- resources/views/shops/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Shop</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shops.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="text" name="image" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="delivery">Delivery:</label>
            <input type="checkbox" name="delivery" value="1">
        </div>

        <div class="form-group">
            <label for="pickup">Pickup:</label>
            <input type="checkbox" name="pickup" value="1">
        </div>

        <div class="form-group">
            <label for="whatsapp">WhatsApp:</label>
            <input type="text" name="whatsapp" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="rate">Rate:</label>
            <input type="number" name="rate" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
