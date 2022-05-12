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

        @foreach ($dataproduct as $dataproducts)

        <div class="row">

            <div class="col-sm-5 col-md-7" style=" justify-content: center; display:flex; height: 400px;" >

                <div class="card" style="width: 50%; height: 300px;" >

                </div>

            </div>

            <div class="col-sm-5 col-md-4">

                <h4 style="margin-top: 40px;">Product</h4>

             

                    <p>Name: {{ $dataproducts->product->Name }}</p>
                    <p>Brand: {{ $dataproducts->product->Brand }}</p>
                    <p>Category: {{ $dataproducts->product->Category }}</p>
                    <p>Specification: {{ $dataproducts->product->Specification }}</p>
                    <p>Selling Price: {{ $dataproducts->product->SellingPrice }}</p>

                    <p>Quantity: {{ $dataproducts->CartQuantity }}</p>

                    <p>Available: {{ $dataproducts->product->storestock->AvailableStock }}</p>

                    <p>Sub total: {{ $dataproducts->product->SellingPrice*$dataproducts->CartQuantity }}</p>

            </div>

        </div>

        @endforeach

        <div class="row">
            
            <div class="col-sm-5 col-md-7">
                
            </div>

            <div class="col-sm-5 col-md-4">

                <hr> 

<form action="{{ route('prepplaceOrderCart') }}" method="POST">

    @csrf
    

    <h4>Select Payment Method</h4>
    
    <a class="btn" id="codbutton" onclick="paymentmet('COD')">COD</a>
    
    <a class="btn" id="epaybutton" onclick="paymentmet('E-Payment')">E-Payment</a>
    
    <a class="btn" id="credbutton" onclick="paymentmet('Credit')">Credit Card</a>

    <input type="hidden" id="paymentmethod" name="paymentmethod" value="">
    <br>
    <input type="hidden" name="customerID" value="{{ $customerID->CustomerID }}">

    @foreach ($customerID->customeraddresses as $address)

    <input type="hidden" name="address" value="Address: {{ $address->Address }} / Barangay: {{ $address->Barangay }}
    / City: {{ $address->City }} / Zip Code: {{ $address->Zip }}
    ">
    
    @endforeach


    @foreach ($dataproduct as $dataproducts)

    <input type="hidden" name="productID[]" value="{{ $dataproducts->ProductID }}">
    <br>
    <input type="hidden" name="quantity[]" value="{{ $dataproducts->CartQuantity }}">
  
        
    @endforeach

    {{-- @foreach ($quantity as $cartItemss )
  

    <br>
        

    @endforeach --}}

    
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
        document.getElementById("codbutton").style.background = "White";      
       }
       if(val == "E-Payment")
       {
        document.getElementById("epaybutton").style.background = "#DBDCDE";
       }
       else
       {
        document.getElementById("epaybutton").style.background = "White";      
       }
    
       if(val == "Credit")
       {
        document.getElementById("credbutton").style.background = "#DBDCDE";
       }
       else
       {
        document.getElementById("credbutton").style.background = "White";      
       }
      
    
    }
    
    </script>

<hr>
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

<input type="hidden" name="totalproduct" value="{{ $subtotal  }}" >

<h4>Total Product: {{ $subtotal }}</h4>

<hr>


<button class="btn btn-primary" >Place Order</button>


</form>

            </div>

        </div>


</div>





{{-- <div>
    <h4>{{ $customerID->CustomerID }}</h4>

    <hr> --}}

    {{-- <h1>{{ $dataproduct }}</h1> --}}

    {{-- @foreach ($dataproduct as $dataproducts)

    <p>{{ $dataproducts->product->Name }}</p>
    <p>{{ $dataproducts->product->Brand }}</p>
    <p>{{ $dataproducts->product->Category }}</p>
    <p>{{ $dataproducts->product->Specification }}</p>
    <p>{{ $dataproducts->product->SellingPrice }}</p>

    <p>sub total: {{ $dataproducts->product->SellingPrice*$dataproducts->CartQuantity }}</p>

    <p>{{ $dataproducts->CartQuantity }}</p>

    

    <hr> --}}

{{-- 
    <p>{{ dd($dataproducts->ordereditems->ProductID) }}</p> --}}

{{--     
    @endforeach  --}}


{{-- 
    @foreach ($quantity as $cartItemss )
        
    <p>{{ $cartItemss }}</p>

    @endforeach --}}

    {{-- @foreach ($subtotal as $cartItemss ) --}}
        
    {{-- <p>{{ $subtotal->sum() }}</p> --}}

    {{-- @endforeach --}}

{{--     
<form action="{{ route('prepplaceOrderCart') }}" method="POST">

    @csrf
    
    <h3>Options</h3>
    
    <h4>Select Payment Method</h4>
    
    <a  id="codbutton" onclick="paymentmet('COD')">COD</a>
    
    <a  id="epaybutton" onclick="paymentmet('E-Payment')">E-Payment</a>
    
    <a id="credbutton" onclick="paymentmet('Credit')">Credit Card</a>

    <input type="hidden" id="paymentmethod" name="paymentmethod" value="">
    <br>
    <input type="hidden" name="customerID" value="{{ $customerID->CustomerID }}">

    @foreach ($customerID->customeraddresses as $address)

    <input type="hidden" name="address" value="Address: {{ $address->Address }} / Barangay: {{ $address->Barangay }}
    / City: {{ $address->City }} / Zip Code: {{ $address->Zip }}
    ">
    
    @endforeach


    @foreach ($dataproduct as $dataproducts)

    <input type="text" name="productID[]" value="{{ $dataproducts->ProductID }}">
    <br>
    <input type="text" name="quantity[]" value="{{ $dataproducts->CartQuantity }}">
  
        
    @endforeach
 --}}
    {{-- @foreach ($quantity as $cartItemss )
  

    <br>
        

    @endforeach --}}

{{--     
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
    
    </script> --}}

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

<input type="hidden" name="deliveryamount" id="delamount"> --}}
{{-- 
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

 --}}
{{-- 
<hr>

<input type="text" name="totalproduct" value="{{ $subtotal  }}" >

<h4>Total Product: {{ $subtotal }}</h4>




<button>Place Order</button>


</form>


    

  


</div> --}}


@endsection