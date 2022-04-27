@extends('layouts.eCommCustomerui')


@section('content')

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
<p>ProductID {{ $productID }}</p>
<p>Delivery Method: {{ $delivery }}</p>

<br>
<p> <b>Payment</b> </p>
<br>

<form action="{{ route('placeordered2') }}" method="POST" >

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
<input type="hidden" name="productID" value="{{ $productID }}">


<label for="">Credit card no:</label>
<input type="text" name="credit">
<br>
<label for="">RPIN:</label>
<input type="number" name="pin">
<br>
<p> <b>Amout details:</b> </p>

<p>Delivery Fee: {{ $deliveryammount }}</p>
<p>Product Total: {{ $totalproduct }}</p>

<hr>


<p>Total amount: {{ $deliveryammount+$totalproduct }}</p>


<button>Checkout</button>

</form>





@endauth
@endsection