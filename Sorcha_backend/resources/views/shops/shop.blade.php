@extends('layouts.main')

@section('container')
<h1 class="text-center mb-4">Laundry</h1>
<table class="table">
    <a href="/tambahshop" type="button" class="btn btn-success">Tambah</a>
    <div class="row">
        @if ($message= Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{ $message }}
          </div>
        @endif
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">city</th>
              <th scope="col">location</th>
              <th scope="col">whatsapp</th>
              <th scope="col">rate</th>
              <th scope="col">description</th>
              <th scope="col">price</th>
            </tr>
          </thead>
          <tbody>

              @foreach ( $data as $shop)
              <tr>
                  <th scope="row">{{ $shop->id }}</th>
                  <td>{{$shop->name}}</td>
                  <td>{{ $shop->city }}</td>
                  <td>{{ $shop->location }}</td>
                  <td>{{ $shop->whatsapp }}</td>
                  <td>{{ $shop->rate }}</td>
                  <td>{{ $shop->description }}</td>
                  <td>{{ $shop->price }}</td>
                  <td>
                    <a href="/tampilshop/{$user->id}" type="button" class="btn btn-warning">Edit</a>
                      <button type="button" class="btn btn-danger">Delete</button>
                  </td>
                </tr>
              @endforeach

          </tbody>
        </table>
    </div>

@endsection
