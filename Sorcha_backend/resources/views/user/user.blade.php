@extends('layouts.main')

@section('container')
    <h1>User</h1>
    <a href="tambahuser" class="btn btn-success">Tambah</a>
    <div class="row">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
           {{ $message }}
          </div>
        @endif
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">username</th>
                <th scope="col">email</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                @foreach ($data as $user)
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['username'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>
                    <a href="/tampiluser/{$user->id}" type="button" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger">Delete</button>
            </tr>
            @endforeach
            </tbody>
          </table>
    </div>

@endsection
