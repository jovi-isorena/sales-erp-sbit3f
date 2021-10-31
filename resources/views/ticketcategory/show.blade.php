@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('categories') }}" class="btn btn-secondary">Back To List</a>
    </div>
    <div>
        <div class="row">
            <div class="col">
                <span>Category ID</span>
            </div>
            <div class="col">
                <span>{{ $category->CategoryID }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span>Name</span>
            </div>
            <div class="col">
                <span>{{ $category->Name }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span>Assigned To</span>
            </div>
            <div class="col">
                <span>{{ $category->Team->TeamName }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span>Default Priority</span>
            </div>
            <div class="col">
                <span>{{ $category->DefaultPriority }}</span>
            </div>
        </div>
        <div class="row">
            <a href="{{ route('categoryEdit', $category->CategoryID) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>

@endsection