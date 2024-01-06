@extends('layouts.main')

@section('container')
<h1 class="text-center mb-4">Laundry progress</h1>
<table class="table">
    <a href="/tambahlaundry" type="button" class="btn btn-success">Tambah</a>
    <div class="row">
        @if ($message= Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{ $message }}
          </div>
        @endif
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Claim Code</th>
              <th scope="col">User Id</th>
              <th scope="col">Shop Id</th>
              <th scope="col">Berat</th>
              <th scope="col">pickup</th>
              <th scope="col">Delivery</th>
              <th scope="col">total</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>

              @foreach ( $data as $dr)
              <tr>
                  <th scope="row">{{ $dr->id }}</th>
                  <td>{{$dr->claim_code}}</td>
                  <td>{{ $dr->user_id }}</td>
                  <td>{{ $dr->shop_id }}</td>
                  <td>{{ $dr->whight }}</td>
                  <td>{{ $dr->pickup_address }}</td>
                  <td>{{ $dr->delivery_address }}</td>
                  <td>{{ $dr->total }}</td>
                  <td>{{ $dr->description }}</td>
                  <td>{{ $dr->status }}</td>
                  <td>
                    <a href="/tampillaundry/{$data->id}" type="button" class="btn btn-warning">Edit</a>
                      <button type="button" class="btn btn-danger">Delete</button>
                  </td>
                </tr>
              @endforeach

          </tbody>
        </table>
    </div>

@endsection
