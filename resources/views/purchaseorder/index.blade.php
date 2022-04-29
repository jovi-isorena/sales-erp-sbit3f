@extends('layouts.inventory')

@section('content')
    <h1>Purchase Orders</h1>
    <hr>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('purchaseOrderCreate') }}" class="btn btn-success">Create Purchase Order</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <form action="">
                <input type="text" name="search" id="search" class="form-control" value={{ request()->query('search') ?? '' }}>

            </form>

        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Created On</th>
                <th scope='col'>Created By</th>
                <th scope='col'>Status</th>
                <th scope='col'></th>
            </tr>
        </thead>
        <tbody>
            @if (sizeof($orders) > 0)
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->ID }}</td>
                        <td>{{  date_format(date_create($order->CreatedDate),"M d, Y  g:i A") }}</td>
                        <td>{{ $order->createdby->FirstName . ' ' . $order->createdby->LastName }}</td>
                        <td>{{ ucfirst($order->Status) }}</td>
                        <td><a href="{{ route('purchaseOrderReceive', $order->ID) }}" class="btn btn-info">Receive</a></td>
                    </tr>
                @endforeach
            @else
                    <tr>
                        <td>
                            No item found.
                        </td>
                    </tr>
            @endif
        </tbody>
    </table>
@endsection