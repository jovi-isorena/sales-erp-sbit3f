@extends('layouts.inventory')

@section('content')
<h1>Pending Order</h1>
{{-- {{ dd($order) }} --}}
<hr>
<h2>Order No: {{ $order->ReleaseOrderID }}</h2>
<h4>Created By: {{ $order->location->Name }}</h4>
<h4>Employee: {{ '( ' . $order->CreatedBy . ' )' . $order->createdby->FirstName . ' ' . $order->createdby->LastName }}</h4>
<div class="row mb-3">
    <table class="table shadow-sm">
        <thead class="table-dark">
            <tr>
                <th scope="col">Product</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->Name }}</td>
                    <td>{{ $item->Quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col">
        <a href="{{ route('releaseOrderFulfill', $order->ReleaseOrderID) }}" class="btn btn-primary w-100">Fulfill</a>
    </div>
</div>
@endsection