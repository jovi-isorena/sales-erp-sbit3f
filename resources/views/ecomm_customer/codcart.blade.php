@extends('layouts.eCommCustomerui')


@section('content')


<div class="container">

    <div class="row">

        <h4>
            Cash On Delivery
        </h4>

        @foreach ($customerID->customeraddresses as $address)
        <p>Type: {{ $address->Type }}</p>
        <p>Address: {{ $address->Address }}</p>
        <p>Barangay: {{ $address->Barangay }}</p>
        <p>City: {{ $address->City }}</p>
        <p>Zip: {{ $address->Zip }}</p>
        @endforeach


    </div>

    <hr>
    @foreach ($productdata as $productdatas)
    <div class="row">

        
        <div class="col-sm-5 col-md-7" style=" justify-content: center; display:flex; height: 400px;" >
         
            <div class="card" style="width: 50%; height: 300px;" >

            </div>

        </div>


        <div class="col-sm-5 col-md-4">

            <h4 style="margin-top: 40px;">Product</h4>
        
         

            <p>Name: {{ $productdatas->product->Name }}</p>
            <p>Brand: {{ $productdatas->product->Brand }}</p>
            <p>Category: {{ $productdatas->product->Category }}</p>
            <p>Specification: {{ $productdatas->product->Specification }}</p>
            <p>Selling Price: {{ $productdatas->product->SellingPrice }}</p>
            <p>Available: {{ $productdatas->product->storestock->AvailableStock }}</p>


            <p>Delivery Method: {{ $delivery }}</p>
        
            <hr>

        
        
    

        </div>

        

      
    </div>

    @endforeach  
    
    <div class="row">

        <div class="col-sm-5 col-md-7">

        </div>

        <div class="col-sm-5 col-md-4">

            <h4>Payment</h4>


            
<form action="{{ route('placeordered3cart') }}" method="POST" >

    @csrf

{{-- for order --}}

   
    <input type="hidden" name="customerID" value="{{ $customerID->CustomerID }}">
    <input type="hidden" name="delivery" value="{{ $delivery }}">
    <input type="hidden" name="totalamount" value="{{ $deliveryammount + $totalproduct }}">

    @foreach ($customerID->customeraddresses as $address)

    <input type="hidden" name="shippingaddress" value="Address: {{ $address->Address }} / Barangay: {{ $address->Barangay }}
    / City: {{ $address->City }} / Zip Code: {{ $address->Zip }}
        ">
    @endforeach

  
    <input type="hidden" name="paymentmethod" value="{{ $paymentmethod }}">
    <input type="hidden" name="orderID" value="{{ $orderID }}">
    
{{-- For orderitems --}}

{{-- 
@foreach ($quantity as $quantitys)

<input type="text" name="orderIDs[]" value="{{ $orderID }}">

<input type="text" name="quantity[]" value="{{ $quantitys }}">

@endforeach


@foreach ($productID as $productIDs)
    

<input type="text" name="productID[]" value="{{ $productIDs }}">


@endforeach --}}


@foreach ($productdata as $productdatas)


<input type="hidden" name="orderIDs[]" value="{{ $orderID }}">

<input type="hidden" name="productID[]" value="{{ $productdatas->ProductID }}">

<input type="hidden" name="quantity[]" value="{{ $productdatas->CartQuantity }}">



@endforeach



<p>Amout details:</p>

<p>Delivery Fee: {{ $deliveryammount }}</p>
<p>Product Total: {{ $totalproduct }}</p>

<hr>


<p>Total amount: {{ $deliveryammount+$totalproduct }}</p>


<button class="btn btn-primary" >Checkout</button>

</form>


        </div>

    </div>



</div>


@auth



<h5>{{ $paymentmethod }}</h5>




<p> <b> Your Information </b></p>
<p>CustomerID: {{ $customerID->CustomerID }}</p>
<p>Address: {{ $address }}</p>
<label for="">Note: This address will be use to deliver your order.</label>

<br>
<br>

<p> <b> Your order:</b></p>

<p>OrderID: {{ $orderID }}</p>

{{-- @foreach ($quantity as $quantitys)
<p>Quantity: {{ $quantitys }}</p> 
@endforeach

@foreach ($productID as $productIDs)
<p>ProductID {{ $productIDs }}</p>  
@endforeach --}}

<hr>

@foreach ($productdata as $productdatas)

    <p>{{ $productdatas->ProductID }}</p>
    <p>{{ $productdatas->product->Name }}</p>
    <p>{{ $productdatas->product->Brand }}</p>
    <p>{{ $productdatas->product->Category }}</p>
    <p>{{ $productdatas->product->Specification }}</p>

    <p>{{ $productdatas->CartQuantity }}</p>

    <hr>

@endforeach


<p>Delivery Method: {{ $delivery }}</p>

<br>
<p> <b>Payment</b> </p>
<br>

<form action="{{ route('placeordered3cart') }}" method="POST" >

    @csrf

{{-- for order --}}

   
    <input type="hidden" name="customerID" value="{{ $customerID->CustomerID }}">
    <input type="hidden" name="delivery" value="{{ $delivery }}">
    <input type="hidden" name="totalamount" value="{{ $deliveryammount + $totalproduct }}">
    <input type="hidden" name="shippingaddress" value="{{ $address }}">
    <input type="hidden" name="paymentmethod" value="{{ $paymentmethod }}">
    <input type="hidden" name="orderID" value="{{ $orderID }}">
    
{{-- For orderitems --}}

{{-- 
@foreach ($quantity as $quantitys)

<input type="text" name="orderIDs[]" value="{{ $orderID }}">

<input type="text" name="quantity[]" value="{{ $quantitys }}">

@endforeach


@foreach ($productID as $productIDs)
    

<input type="text" name="productID[]" value="{{ $productIDs }}">


@endforeach --}}


@foreach ($productdata as $productdatas)


<input type="text" name="orderIDs[]" value="{{ $orderID }}">

<input type="text" name="productID[]" value="{{ $productdatas->ProductID }}">

<input type="text" name="quantity[]" value="{{ $productdatas->CartQuantity }}">



@endforeach



<p> <b>Amout details:</b> </p>

<p>Delivery Fee: {{ $deliveryammount }}</p>
<p>Product Total: {{ $totalproduct }}</p>

<hr>


<p>Total amount: {{ $deliveryammount+$totalproduct }}</p>


<button>Checkout</button>

</form>






@endauth
@endsection