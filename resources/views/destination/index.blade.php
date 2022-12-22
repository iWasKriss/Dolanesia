@extends('layouts.app')
@section('judul')
    Manage Destination
@endsection

@section('content')
    <div class="container py-5">
        <div class="col-md-12 p-4 shadow-sm rounded">
            <h2>Manage Destinations</h2>
            <hr>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
            <a href="{{ route('destination.create') }}" class="btn btn-info my-2">Add Destination</a>
            @if (count($destination) != 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" style="width: 15%">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Ticket Total</th>
                            <th scope="col">Price</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">About</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destination as $des)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="{{ asset('storage/destinations/' . $des->image) }}" alt="image"
                                        class="w-100">
                                </td>
                                <td>{{ $des->name }}</td>
                                <td>
                                    @if ($des->ticket != 0)
                                        <span class="d-block">{{ $des->ticket }}</span>
                                    @else
                                        <span class="badge bg-danger">sold out</span>
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($des->price) }}</td>
                                <td>{{ $des->address }}</td>
                                <td>{{ $des->phone }}</td>
                                <td>{{ substr($des->about, 0, 90) }}...</td>
                                <td>
                                    <a href="{{ route('destination.edit', $des->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('destination.destroy', $des->id) }}" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();
                                         document.getElementById('delete-destination-form-{{ $des->id }}').submit();">
                                        Delete
                                        <form id="delete-destination-form-{{ $des->id }}"
                                            action="{{ route('destination.destroy', $des->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </a>
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
