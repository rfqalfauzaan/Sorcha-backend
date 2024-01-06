@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-4">Edit User</h1>
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
            <div class="cardbody">
                <form action="/updateshop/{{ $data}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $data ? $data->name : '' }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">location</label>
                      <input type="text" name="location" class="form-control" id="location" aria-describedby="emailHelp" value="{{ $data ? $data->location : '' }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">city</label>
                      <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="city">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">whatsapp</label>
                      <input type="text" name="whatsapp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data ? $data->whatsapp : '' }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">description</label>
                      <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data ? $data->description : '' }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">price</label>
                      <input type="double" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data ? $data->price : '' }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">rate</label>
                      <input type="double" name="rate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data ? $data->rate : '' }}">
                    </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>
    </div>
@endsection
