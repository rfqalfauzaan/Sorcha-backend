<!-- resources/views/laundries/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Laundry</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('laundries.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="shop_id">Shop ID:</label>
            <input type="text" name="shop_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="text" name="weight" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pickup_address">Pickup Address:</label>
            <textarea name="pickup_address" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="delivery_address">Delivery Address:</label>
            <textarea name="delivery_address" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" name="total" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
