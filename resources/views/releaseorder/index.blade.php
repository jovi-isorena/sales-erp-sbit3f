@extends('layouts.inventory')

@section('content')
<h1>Release Orders</h1>
<hr>
<div class="row mb-3">
    <div class="col">
        <a href="{{ route('releaseOrderCreate') }}" class="btn btn-success">Create Order</a>

    </div>
</div>
<div class="row">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Order No.</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->ReleaseOrderID }}</td>
                    <td>{{ Carbon\Carbon::parse($order->CreatedDate)->diffForHumans() }}</td>
                    <td>{{ $order->location->Name }}</td>
                    <td>{{ $order->Status }}</td>
                    <td>
                        <a href="{{ route('releaseOrderShow', $order->ReleaseOrderID) }}">Show</a>
                        <a href="{{ route( 'releaseOrderFulfill', $order->ReleaseOrderID) }}">Fulfill</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection