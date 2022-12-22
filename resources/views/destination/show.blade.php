@extends('layouts.app')

@section('judul')
    Destination Detail - Dolanesia
@endsection

@section('content')
    <div class="col-md-6 m-auto py-5">
        <div class="card">
            <div class="card-header">
                Destination Detail
            </div>
            <div class="card-body">
                <img src="{{ asset('/storage/destinations/' . $destination->image) }}" class="w-100 mb-3" alt="image">
                @if (session()->has('error_message'))
                    <div class="alert alert-danger">{{ session()->get('error_message') }}</div>
                @endif
                <h5 class="card-title">{{ $destination->name }}</h5>
                <h5 class="text-info mb-3">Rp. {{ number_format($destination->price) }}</h5>
                <div class="row">
                    <div class="col-md-4">
                        <p class="card-text">
                            <b>Category</b>
                            <span class="d-block">{{ $destination->category->name }}</span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="card-text">
                            <b class="d-block">Ticket Stock</b>
                            @if ($destination->ticket != 0)
                                <span>{{ $destination->ticket }}</span>
                            @else
                                <span class="badge bg-danger">sold out</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="card-text">
                            <b>Phone</b>
                            <span class="d-block">{{ $destination->phone }}</span>
                        </p>
                    </div>
                </div>
                <p class="card-text mt-3">
                    <b>Address</b>
                    <span class="d-block">{{ $destination->about }}</span>
                </p>

                @if ($destination->ticket != 0)
                    @guest
                        <a href="/login" class="btn btn-success w-100">Buy
                            Ticket</a>
                    @else
                        @if (Auth::user()->status == 'tourist')
                            <a href="#" class="btn btn-success w-100" data-bs-toggle="modal"
                                data-bs-target="#buyTicket">Buy
                                Ticket</a>
                        @endif
                    @endguest
                @else
                    <a href="#" class="btn btn-secondary w-100">Sold Out</a>
                @endif

                <div class="modal fade" id="buyTicket" tabindex="-1" aria-labelledby="buyTicketLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('checkout') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="buyTicketLabel">Buy Ticket</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="d-none" name="destination" value={{ $destination->id }}>
                                    <div class="mb-3">
                                        <label for="ticket_qty" class="form-label">Ticket Total</label>
                                        <input type="number" name="ticket_qty"
                                            class="form-control @error('ticket_qty') is-invalid @enderror" id="ticket_qty"
                                            placeholder="Enter the number of tickets" value="{{ old('ticket_qty') }}">
                                        @error('ticket_qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Checkout</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
