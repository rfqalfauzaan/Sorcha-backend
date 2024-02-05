<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 style="text-align: center" >Dashboard</h1>

    <div class="row">
        @foreach ($data as $item)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        <p class="card-text">{{ $item['value'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
