@extends('layouts.inventory')
@if ($errors->any())
    {{-- {{ dd($errors) }} --}}
@endif
{{-- {{ dd(old()) }} --}}
@section('content')
    <h1>Receiving Purchase Order</h1>
    <hr>
    Order ID: {{ $purchaseOrder->ID }}
    <br>
    Created On: {{ date_format(date_create($purchaseOrder->CreatedDate),"M d, Y  g:i A") }}
    <br>
    {{-- {{ dd($createdby) }} --}}
    Created By: {{ $purchaseOrder->createdby->FirstName . ' ' . $purchaseOrder->createdby->LastName}}

    <div>
        <form action="{{ route('purchaseOrderUpdate', $purchaseOrder->ID) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3 align-items-center justify-content-center text-center">
                <div class="col-2">
                    Product ID
                </div>
                <div class="col-8">
                    Name
                </div>
                <div class="col-2">
                    Received<br>Quantity
                </div>
            </div>
    
            @foreach ($purchaseOrder->purchaseorderitems as $key=>$orderItem)
                <div class="row mb-3 align-items-center justify-content-center text-center border-top pt-3">
                    <input type="hidden" name="orderitemid[{{ $key }}]" value="{{ $orderItem->ID }}">
                    <div class="col-2">
                        {{  $orderItem->ProductID }}
                    </div>
                    <div class="col-8 text-left">
                        {{ $orderItem->product->Name }}
                    </div>
                    <div class="col-1 justify-content-right align-items-center">
                        <input type="number" name="recquantity[{{ $key }}]" id="recquantity[{{ $key }}]" min=0 class="form-control @error('recquantity.'. $key) is-invalid @enderror" value="{{ old('recquantity')[$key] }}">
                        
                    </div>
                    <div class="col-1 text-left">
                        <span style="font-size: 1.2rem;">/ {{  $orderItem->Quantity }}</span>
                    </div>
                </div>
                
            @endforeach

            <div class="row mb-3">
                <div class="col-12">
                    Received Date: {{ now('Asia/Manila') }}
                </div>
                <div class="col-12">
                    Delivered By: 
                    <span class="text-danger text-sm fst-italic"> *
                        @error('deliveryman')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="text" name="deliveryman" id="deliveryman" class="form-control" placeholder="Full Name">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>


    </div>
@endsection