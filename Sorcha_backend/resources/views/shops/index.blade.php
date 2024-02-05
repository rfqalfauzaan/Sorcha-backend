<!-- resources/views/shops/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Shop</h1>

    <a href="{{ route('shops.create') }}" class="btn btn-primary">Create Shop</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>City</th>
                <th>Delivery</th>
                <th>Pickup</th>
                <th>WhatsApp</th>
                <th>Description</th>
                <th>Price</th>
                <th>Rate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shops as $shop)
                <tr>
                    <td>{{ $shop->id }}</td>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->location }}</td>
                    <td>{{ $shop->city }}</td>
                    <td>{{ $shop->delivery ? 'Yes' : 'No' }}</td>
                    <td>{{ $shop->pickup ? 'Yes' : 'No' }}</td>
                    <td>{{ $shop->whatsapp }}</td>
                    <td>{{ $shop->description }}</td>
                    <td>{{ $shop->price }}</td>
                    <td>{{ $shop->rate }}</td>
                    <td>
                        <a href="{{ route('shops.show', $shop->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('shops.edit', $shop->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('shops.destroy', $shop->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
