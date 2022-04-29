@extends('layouts.inventory')

@section('content')
    <h1>Quality Control Tests</h1>
    <hr>
    <div class="row">
        <div class="col">
            <a href="{{ route('qualityControlTestCreate') }}" class="btn btn-success">Start a Test</a>
        </div>
    </div>
@endsection