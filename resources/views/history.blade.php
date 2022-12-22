@extends('layouts.app')
@section('judul')
    Transaction History
@endsection

@section('content')
    <div class="container vh-100 py-5">
        <div class="col-md-9 p-4 shadow-sm rounded">
            <h2>Transaction Histories</h2>
            <hr>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
            @if (count($histories) != 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tourist</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Total Cost</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col" style="width: 20%" class="text-center">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <span class="fw-bold d-block">{{ $history->user->name }}</span>
                                    <a href="#" class="text-sm fw-bold">{{ $history->user->email }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('destination.show', $history->destination_id) }}"
                                        class="fw-bold text-decoration-none">
                                        {{ $history->destination->name }}
                                    </a>
                                    <span class="d-block">Total Ticket: {{ $history->ticket_qty }}</span>
                                </td>
                                <td>Rp. {{ number_format($history->subtotal) }}</td>
                                <td>{{ $history->created_at }}</td>
                                <td class="text-center">
                                    {{-- 
                                    reference
                                    https://www.pngegg.com/id/png-zogos/download
                                --}}
                                    <img src="{{ asset('img/paid.png') }}" alt="paid" class="w-50">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="bg-warning text-dark p-2 rounded">Data is empty</div>
            @endif
        </div>
    </div>
@endsection
