@extends('layouts.eCommCustomerui')


@section('content')



<div class="container">
    <div class="row">
        <h4>Delivery Address</h4>

        <p>Customer: {{ $customerID->FirstName }} {{ $customerID->LastName }}</p>

       
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

            <hr>

            <form action="{{ route('prepplaceOrdered') }}" method="POST">

                @csrf
            <h4>Select Payment Method</h4>

            
<a class="btn" id="codbutton" onclick="paymentmet('COD')">COD</a>

<a  class="btn" id="epaybutton" onclick="paymentmet('E-Payment')">E-Payment</a>

<a class="btn " id="credbutton" onclick="paymentmet('Credit')">Credit Card</a>

{{-- Inputs --}}

<input type="hidden" id="paymentmethod" name="paymentmethod" value="" >




<br>
<input type="hidden" name="customerID" value="{{ $customerID->CustomerID }}">
<br>

@foreach ($customerID->customeraddresses as $address)

<input type="hidden" name="address" value="Address: {{ $address->Address }} / Barangay: {{ $address->Barangay }}
/ City: {{ $address->City }} / Zip Code: {{ $address->Zip }}
">
@endforeach

<hr>

<input type="hidden" name="quantity" value="{{ $quantity }}">
<br>
<input type="hidden" name="productID" value="{{ $product->ProductID }}">

<script>

function paymentmet(val)
{
   var method = document.getElementById("paymentmethod").value = val;

   if(val == "COD")
   {
    document.getElementById("codbutton").style.background = "#DBDCDE";
   }
   else
   {
    document.getElementById("codbutton").style.background = "none";      
   }
   if(val == "E-Payment")
   {
    document.getElementById("epaybutton").style.background = "#DBDCDE";
   }
   else
   {
    document.getElementById("epaybutton").style.background = "none";      
   }

   if(val == "Credit")
   {
    document.getElementById("credbutton").style.background = "#DBDCDE";
   }
   else
   {
    document.getElementById("credbutton").style.background = "none";      
   }
  

}

</script>

<br>
<h4>Select Delivery</h4>

<h5>Delivery 1: Arrival: 1-3 days Price: P50</h5>
<h5>Delivery 2: Arrival: 1 day Price: P100</h5>

<select class="btn" name="delivery" id="del" onchange="getvalue()">
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




                <h4>Total Product: {{ $product->SellingPrice*$quantity }}</h4>

                <input type="hidden" name="totalproduct" value="{{ $product->SellingPrice*$quantity }}" id="">

                <hr>

                <button class="btn btn-primary">Place Order</button>



            </form>

        </div>

    </div>

</div>


{{-- 
<h3>Delivery Address</h3>

<h4>{{ $customerID->CustomerID }}</h4>


@foreach ($customerID->customeraddresses as $address)
  
<h4>Type: {{ $address->Type }}</h4>
<h4>Address: {{ $address->Address }}</h4>
<h4>Barangay: {{ $address->Barangay }}</h4>
<h4>City: {{ $address->City }}</h4>
<h4>Zip: {{ $address->Zip }}</h4>


@endforeach


<hr>


<h3>Product</h3>


<h4>{{ $product->Name }}</h4>
<h4>{{ $product->Brand }}</h4>
<h4>{{ $product->Category }}</h4>
<h4>{{ $product->Specification }}</h4>
<h4>{{ $product->Name }}</h4>
<h4>{{ $product->SellingPrice }}</h4>




<h4>Quantity: {{ $quantity }}</h4>

<hr> --}}
{{-- 
<form action="{{ route('prepplaceOrdered') }}" method="POST">

@csrf

<h3>Options</h3>

<h4>Select Payment Method</h4>

<a  id="codbutton" onclick="paymentmet('COD')">COD</a>

<a  id="epaybutton" onclick="paymentmet('E-Payment')">E-Payment</a>

<a id="credbutton" onclick="paymentmet('Credit')">Credit Card</a> --}}

{{-- Inputs --}}
{{-- 
<input type="hidden" id="paymentmethod" name="paymentmethod" value="">
<br>
<input type="hidden" name="customerID" value="{{ $customerID->CustomerID }}">
<br>

@foreach ($customerID->customeraddresses as $address)

<input type="text" name="address" value="Address: {{ $address->Address }} / Barangay: {{ $address->Barangay }}
/ City: {{ $address->City }} / Zip Code: {{ $address->Zip }}
">

@endforeach

<br>
<input type="hidden" name="quantity" value="{{ $quantity }}">
<br>
<input type="hidden" name="productID" value="{{ $product->ProductID }}">
 --}}
<script>

// function paymentmet(val)
// {
//    var method = document.getElementById("paymentmethod").value = val;

//    if(val == "COD")
//    {
//     document.getElementById("codbutton").style.background = "Gray";
//    }
//    else
//    {
//     document.getElementById("codbutton").style.background = "White";      
//    }
//    if(val == "E-Payment")
//    {
//     document.getElementById("epaybutton").style.background = "Gray";
//    }
//    else
//    {
//     document.getElementById("epaybutton").style.background = "White";      
//    }

//    if(val == "Credit")
//    {
//     document.getElementById("credbutton").style.background = "Gray";
//    }
//    else
//    {
//     document.getElementById("credbutton").style.background = "White";      
//    }
  

// }

</script>
{{-- 
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
 --}}
<script>
    // function getvalue()
    // {
    //     var selectedval = document.getElementById("del").value;

    //     var amount1 = 50;
    //     var amount2 = 100;

    //     if(selectedval == "Delivery1")
    //     {
    //         document.getElementById("delamount").value = amount1;
    //     }
    //     // else
    //     // {
    //     //      document.getElementById("delamount").value = "";
    //     // }

    //     if(selectedval == "Delivery2")
    //     {
    //         document.getElementById("delamount").value = amount2;
    //     }
    //     // else
    //     // {
    //     //      document.getElementById("delamount").value = "";
    //     // }


        
    // }
</script>

{{-- 

<hr>




<h4>Product Total: {{ $product->SellingPrice*$quantity }}</h4>

<input type="hidden" name="totalproduct" value="{{ $product->SellingPrice*$quantity }}" id="">

<hr>

<button>Place Order</button>

</form> --}}

@endsection