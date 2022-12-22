@extends('layouts.app')

@section('judul')
    Home - Dolanesia
@endsection

@section('content')
    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="display-4 fw-bold mb-3">Welcome to Dolanesia</h1>
            <a href="{{ url('/explore') }}" class="btn border-dark">Explore Destinations</a>
        </div>
    </div>
@endsection
