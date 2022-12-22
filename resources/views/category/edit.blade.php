@extends('layouts.app')
@section('judul')
    Edit Category
@endsection

@section('content')
    <div class="container vh-100 py-5">
        <div class="col-md-6 p-4 shadow-sm rounded">
            <h2>Create Category</h2>
            <hr>
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Category name" value="{{ $category->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
