@extends('layouts.main')
@section('container')
<div class="card my-5">

    <form class="card-body cardbody-color p-lg-5">

      <div class="text-center">
        <img src="" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
          width="200px" alt="profile">
      </div>

      <div class="mb-3">
        <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
          placeholder="User Name">
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" id="password" placeholder="password">
      </div>
      <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
    </form>
  </div>

</div>
</div>
</div>
@endsection
