@extends('layouts.app')

@section('content')
    <form action="{{ route('customerLoad') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="customerId" class="form-label">Customer Id to Load in Session</label>
            <input type="text" class="form-control" id="customerId" name="customerId" value="CUS0000001" >
        </div>
        <input type="submit" value="Load" class="btn btn-primary">
    </form>
@endsection