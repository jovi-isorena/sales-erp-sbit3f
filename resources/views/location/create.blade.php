@extends('layouts.adminmodule')

@section('content')
    <h1>New Location</h1>
    <hr>
    <div class="w-50 m-auto">
        <form action="{{ route('locationStore') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('address')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
@endsection