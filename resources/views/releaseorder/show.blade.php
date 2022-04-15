@extends('layouts.inventory')

@section('content')
<h1>Pending Order</h1>
{{ dd($order->ProductID) }}
<hr>
<h2>{{ $releaseOrder->ReleaseOrderID }}</h2>
@endsection