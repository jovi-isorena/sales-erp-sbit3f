@extends('layouts.eCommCustomerui')


@section('content')

<hr>

<h3>Delivery Address</h3>

<h4>{{$customerID}}</h4>
<h4>Type: {{ $address->Type }}</h4>
<h4>Address: {{ $address->Address }}</h4>
<h4>Barangay: {{ $address->Barangay }}</h4>
<h4>City: {{ $address->City }}</h4>
<h4>Zip: {{ $address->Zip }}</h4>

<hr>


<h3>Product</h3>

<h4>{{ $product->Name }}</h4>
<h4>{{ $product->Brand }}</h4>
<h4>{{ $product->Category }}</h4>
<h4>{{ $product->Specification }}</h4>
<h4>{{ $product->Name }}</h4>
<h4>{{ $product->SellingPrice }}</h4>

<h4>Quantity: {{ $quantity }}</h4>

<hr>

<form action="{{ route('prepplaceOrdered') }}" method="POST">

@csrf

<h3>Options</h3>

<h4>Select Payment Method</h4>

<a  id="codbutton" onclick="paymentmet('COD')">COD</a>

<a  id="epaybutton" onclick="paymentmet('E-Payment')">E-Payment</a>

<a id="credbutton" onclick="paymentmet('Credit')">Credit Card</a>

{{-- Inputs --}}

<input type="hidden" id="paymentmethod" name="paymentmethod" value="">
<br>
<input type="hidden" name="customerID" value="{{ $customerID }}">
<br>
<input type="hidden" name="address" value="{{ $address->Address }}">
<br>
<input type="hidden" name="quantity" value="{{ $quantity }}">
<br>
<input type="hidden" name="productID" value="{{ $product->ProductID }}">

<script>

function paymentmet(val)
{
   var method = document.getElementById("paymentmethod").value = val;

   if(val == "COD")
   {
    document.getElementById("codbutton").style.background = "Gray";
   }
   else
   {
    document.getElementById("codbutton").style.background = "White";      
   }
   if(val == "E-Payment")
   {
    document.getElementById("epaybutton").style.background = "Gray";
   }
   else
   {
    document.getElementById("epaybutton").style.background = "White";      
   }

   if(val == "Credit")
   {
    document.getElementById("credbutton").style.background = "Gray";
   }
   else
   {
    document.getElementById("credbutton").style.background = "White";      
   }
  

}

</script>

<br>
<h4>Select Delivery</h4>

<h5>Delivery 1: Arrival: 1-3 days Price: P50</h5>
<h5>Delivery 2: Arrival: 1 day Price: P100</h5>

<select name="delivery" id="del" onchange="getvalue()">
    <option value="">Choose Delivery</option>
    <option value="Delivery1">Delivery 1</option>
    <option value="Delivery2">Delivery 2</option>
</select>

<input type="hidden" name="deliveryamount" id="delamount">

<script>
    function getvalue()
    {
        var selectedval = document.getElementById("del").value;

        var amount1 = 50;
        var amount2 = 100;

        if(selectedval == "Delivery1")
        {
            document.getElementById("delamount").value = amount1;
        }
        // else
        // {
        //      document.getElementById("delamount").value = "";
        // }

        if(selectedval == "Delivery2")
        {
            document.getElementById("delamount").value = amount2;
        }
        // else
        // {
        //      document.getElementById("delamount").value = "";
        // }


        
    }
</script>



<hr>

<h4>Product Total: {{ $product->SellingPrice*$quantity }}</h4>

<input type="hidden" name="totalproduct" value="{{ $product->SellingPrice*$quantity }}" id="">

<hr>

<button>Place Order</button>

</form>

@endsection