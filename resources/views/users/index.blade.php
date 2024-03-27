@extends('layouts.app')

@section('title', 'Home User')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List User</h1>
    </div>
    <hr />
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>+
        @if($user->count() > 0)
            @foreach($user as $ur)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $ur->name }}</td>
                    <td class="align-middle">{{ $ur->email }}</td>
                    <td class="align-middle">{{ $ur->password }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="{{ route('products.destroy', $ur->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">User not found</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
