@extends('layouts.eCommCustomerui')


@section('content')



<div class="container">


    <div class="row">

        <h4>
            Cash On Delivery
        </h4>

        <p>Customer: {{ $customerID->FirstName }} {{ $customerID->LastName }} </p>


        @foreach ($customerID->customeraddresses as $address)
        <p>Type: {{ $address->Type }}</p>
        <p>Address: {{ $address->Address }}</p>
        <p>Barangay: {{ $address->Barangay }}</p>
        <p>City: {{ $address->City }}</p>
        <p>Zip: {{ $address->Zip }}</p>
        @endforeach

    </div>
    <hr>

    <div class="row">
        <h4>Your Order</h4>
        <div class="col-sm-5 col-md-7" style=" justify-content: center; display:flex; height: 400px;" >
         
            <div class="card" style="width: 50%; height: 300px;" >

            </div>

        </div>


        <div class="col-sm-5 col-md-4">

            <h4 style="margin-top: 40px;">Product</h4>

            <p>Name: {{ $product->Name }}</p>
            <p>Brand: {{ $product->Brand }}</p>
            <p>Category: {{ $product->Category }}</p>
            <p>Specification: {{ $product->Specification }}</p>
            <p>Selling Price: {{ $product->SellingPrice }}</p>

            <p>Available: {{ $product->storestock->AvailableStock }}</p>

            <p>Delivery Method: {{ $delivery }}</p>

            <hr>

            <h4>Payment</h4>

            
<form action="{{ route('placeordered3') }}" method="POST" >

    @csrf

{{-- for order --}}

    <input type="hidden" name="orderID" value="{{ $orderID }}">
    <input type="hidden" name="customerID" value="{{ $customerID->CustomerID }}">
    <input type="hidden" name="delivery" value="{{ $delivery }}">
    <input type="hidden" name="totalamount" value="{{ $deliveryammount + $totalproduct }}">

    @foreach ($customerID->customeraddresses as $address)

    <input type="hidden" name="shippingaddress" value="Address: {{ $address->Address }} / Barangay: {{ $address->Barangay }}
    / City: {{ $address->City }} / Zip Code: {{ $address->Zip }}
        ">
    @endforeach

    {{-- <input type="hidden" name="shippingaddress" value="{{ $address }}">
     --}}
    <input type="hidden" name="paymentmethod" value="{{ $paymentmethod }}">

    
{{-- For orderitems --}}

<input type="hidden" name="quantity" value="{{ $quantity }}">
<input type="hidden" name="productID" value="{{ $product->ProductID }}">



<p>Amout details: </p>

<p>Delivery Fee: {{ $deliveryammount }}</p>
<p>Product Total: {{ $totalproduct }}</p>

<hr>


<p>Total amount: {{ $deliveryammount+$totalproduct }}</p>


<button class="btn btn-primary">Checkout</button>

</form>




        </div> 

    

    </div>


</div>






@auth



<h5>{{ $paymentmethod }}</h5>




<p> <b> Your Information </b></p>
<p>CustomerID: {{ $customerID }}</p>
<p>Address: {{ $address }}</p>
<label for="">Note: This address will be use to deliver your order.</label>

<br>
<br>

<p> <b> Your order:</b></p>

<p>OrderID: {{ $orderID }}</p>
<p>Quantity: {{ $quantity }}</p>
{{-- <p>ProductID {{ $productID }}</p> --}}
<p>Delivery Method: {{ $delivery }}</p>

<br>
<p> <b>Payment</b> </p>
<br>

<form action="{{ route('placeordered3') }}" method="POST" >

    @csrf

{{-- for order --}}

    <input type="hidden" name="orderID" value="{{ $orderID }}">
    <input type="hidden" name="customerID" value="{{ $customerID }}">
    <input type="hidden" name="delivery" value="{{ $delivery }}">
    <input type="hidden" name="totalamount" value="{{ $deliveryammount + $totalproduct }}">
    <input type="hidden" name="shippingaddress" value="{{ $address }}">
    <input type="hidden" name="paymentmethod" value="{{ $paymentmethod }}">

    
{{-- For orderitems --}}

<input type="hidden" name="quantity" value="{{ $quantity }}">
<input type="hidden" name="productID" value="{{ $product->ProductID }}">



<p> <b>Amout details:</b> </p>

<p>Delivery Fee: {{ $deliveryammount }}</p>
<p>Product Total: {{ $totalproduct }}</p>

<hr>


<p>Total amount: {{ $deliveryammount+$totalproduct }}</p>


<button>Checkout</button>

</form>






@endauth
@endsection