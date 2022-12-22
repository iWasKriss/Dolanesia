@extends('layouts.app')

@section('judul')
    Explore - Dolanesia
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            @forelse ($destination as $des)
                <div class="col-md-3 mb-3">
                    <div class="card w-100 border-0 shadow-sm">
                        <img src="{{ asset('storage/destinations/' . $des->image) }}" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $des->name }}</h5>
                            <p class="card-text fw-bold text-info">Rp. {{ number_format($des->price) }}</p>
                            <p class="card-text">{{ substr($des->about, 0, 90) }}...</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="card-text">
                                        <b>Phone</b>
                                        <span class="d-block">{{ $des->phone }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text">
                                        <b class="d-block">Ticket Stock</b>
                                        @if ($des->ticket != 0)
                                            <span>{{ $des->ticket }}</span>
                                        @else
                                            <span class="badge bg-danger">sold out</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <p class="card-text mt-3">
                                <b>Category</b>
                                <span class="d-block">{{ $des->category->name }}</span>
                            </p>
                            <p class="card-text">
                                <b>Address</b>
                                <span class="d-block">{{ substr($des->address, 0, 40) }}...</span>
                            </p>

                            <a href="{{ route('destination.show', $des->id) }}" class="btn btn-success w-100">Show
                                Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-warning text-dark p-2 rounded">Data is empty</div>
            @endforelse

        </div>
    </div>
@endsection
