@extends('layouts.inventory')
@php
    $locations = ['Warehouse', 'Store', 'Delivery', 'Customer'];
    $statuses = ['Brand New', 'Damaged', 'Missing', 'Refurbished', 'Decommissioned'];
@endphp

@section('content')
<div class="d-flex justify-content-center p-0">
    <div class="card w-50 shadow">
        <form action="{{ route('serializedUpdate', $serialized->ID) }}" method="post">
            <div class="card-header">
                <span class="card-title">Update  on </span>
            </div>
            <div class="card-body">
                @csrf
                @method('put')
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <span>Serial No:</span>
                        <br>
                        <span class="lead">{{ $serialized->SerialNo }}</span>
                        <br>
                        <span>Product Name: </span>
                        <br>
                        <span class="lead">{{ $serialized->product->Name }}</span>
                        
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label for="location">New Location</label>
                        <select name="location" id="" class="form-select">
                            @foreach ($locations as $location)
                                <option value="{{ $location }}" {{ $location == $serialized->Location ? 'selected' : ''; }}>{{ $location }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label for="status">New Status</label>
                        <select name="status" id="" class="form-select">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" {{ $status == $serialized->Status ? 'selected' : ''; }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-3">Update</button>
                <a href="{{ route('serializedIndex') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection
