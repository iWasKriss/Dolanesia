@extends('layouts.app')
@section('judul')
    Manage Categories
@endsection

@section('content')
    <div class="container vh-100 py-5">
        <div class="col-md-6 p-4 shadow-sm rounded">
            <h2>Manage Categories</h2>
            <hr>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
            <a href="{{ route('category.create') }}" class="btn btn-info my-2">Add Category</a>
            @if (count($categories) != 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();
                                         document.getElementById('delete-category-form-{{ $category->id }}').submit();">
                                        Delete
                                        <form id="delete-category-form-{{ $category->id }}"
                                            action="{{ route('category.destroy', $category->id) }}" method="POST"
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
