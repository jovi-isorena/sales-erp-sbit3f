@extends('layouts.inventory')

@section('content')
<div class="row mb-3">
    <div class="col">
        <a href="{{ route('inventoryLandingPage') }}" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> Back</a>
    </div>
</div>
<h1>Inventory dashboard</h1>
<div class="row mb-5">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card text-center shadow">
            <div class="card-header bg-success text-white">
                <span class="card-title">
                    Registered Items
                </span>
            </div>
            <div class="card-body">
                <h2>{{  $products }}</h2>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('inventoryMaintenance') }}">View List</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card text-center shadow">
            <div class="card-header bg-warning">
                <span class="card-title">
                    Low Stock
                </span>
            </div>
            <div class="card-body">
                <h2>{{ $low }}</h2>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('warehouseStockIndex',['level'=>'low']) }}">View List</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card text-center shadow">
            <div class="card-header bg-danger text-white">
                <span class="card-title">
                    Critical Level
                </span>
            </div>
            <div class="card-body">
                <h2>{{ $critical }}</h2>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('warehouseStockIndex',['level'=>'critical']) }}">View List</a>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-center shadow">
            <div class="card-header bg-info">
                <span class="card-title">
                    Serialized Product
                </span>
            </div>
            <div class="card-body">
                <span class="lead">{{ $serials->count() }}</span>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('serializedIndex') }}">View List</a>
            </div>
        </div>
    </div> --}}
</div>
<hr>
<div class="row">
    <h2>Store Release Orders</h2>
    <h6 class="text-mute fst-italic">Count: 3</h6>
    <table class="table table-hover text-center border border-2 shadow w-50">
        <thead class="table-dark">
            <tr>
                <th scope="col">Order No.</th>
                <th scope="col">Created On</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">0001</td>
                <td>02/09/2022</td>
                <td>
                    <a href="" class="btn btn-info rounded">Details</a>
                </td>
            </tr>
            <tr>
                <td scope="row">0002</td>
                <td>02/10/2022</td>
                <td>
                    <a href="" class="btn btn-info rounded">Details</a>
                </td>
            </tr>
            <tr>
                <td scope="row">0003</td>
                <td>02/11/2022</td>
                <td>
                    <a href="" class="btn btn-info rounded">Details</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection
