@extends('layouts.inventory')
{{-- {{ dd($errors) }} --}}
@section('content')
<h1>Fulfill Order</h1>
@php
    $orderItemIndex = 0;
@endphp
<hr>
<h2>Order No: {{ $order->ReleaseOrderID }}</h2>
<h4>Created By: {{ $order->location->Name }}</h4>
<h4>Employee: {{ '( ' . $order->CreatedBy . ' )' . $order->createdby->FirstName . ' ' . $order->createdby->LastName }}</h4>

<form action="{{ route('releaseOrderSave', $order->ReleaseOrderID) }}" method="post">
    @csrf
    @foreach ($order->items as $item)
        <div class="card w-75 m-auto mb-3 ">
            <div class="card-header bg-dark text-white shadow-sm">
                <span class="card-title">
                    {{ $item->product->Name }}
                    <br>
                    Requested: {{ $item->Quantity }}
                </span>
            </div>
            <div class="card-body">
                @for ($i = 0; $i < $item->Quantity; $i++)
                    <div class="col mb-2">
                        <input type="text" name="serial[{{ $orderItemIndex }}]" id="serial[{{ $orderItemIndex }}]" class="form-control @error('serial[{{ $orderItemIndex }}]') is-invalid @enderror" placeholder="Serial No.">
                        <span class="text-sm text-danger fst-italic">
                            @error('serial.{{ $i }}')
                                {{  $message }}
                                he
                            @enderror
                        </span>
                        <input type="hidden" name="productid[{{ $orderItemIndex }}]" id="productid[{{ $orderItemIndex }}]" value="{{ $item->ProductID }}">
                    </div>
                    @php
                    $orderItemIndex += 1; 
                    @endphp
                @endfor
                        
            </div>
        </div>
        
    @endforeach
    <div class="row">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection