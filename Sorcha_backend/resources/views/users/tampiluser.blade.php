@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-4">Edit User</h1>
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
            <div class="cardbody">
                <form action="/updateuser/{{ $data->id ?? 'code notfound'}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" value="{{ $data->username ?? 'code not found'}}">
                      </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->email ?? 'code not found'}}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{$data->password ?? 'code not found'}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
      </div>
    </div>

@endsection
