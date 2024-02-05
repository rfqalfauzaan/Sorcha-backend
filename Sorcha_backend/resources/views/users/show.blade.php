<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>User Details</h1>

    <ul>
        <li><strong>ID:</strong> {{ $user->id }}</li>
        <li><strong>Username:</strong> {{ $user->username }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>password:</strong> {{ $user->password }}</li>
    </ul>

    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
@endsection
