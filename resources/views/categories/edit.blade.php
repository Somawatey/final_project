@extends('layouts.app')

@section('title', 'Edit Category')

@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $category->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Detail</label>
                <input type="text" name="detail" class="form-control" placeholder="Detail" value="{{ $category->detail }}" >
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
