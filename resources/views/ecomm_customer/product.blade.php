@extends('layouts.eCommCustomerui')


@section('content')



@if($customerID)
   

<div>

    <h2>{{ $product->Name }}</h2>
    <p>{{ $product->Brand }}</p>
    <p>{{ $product->Category }}</p>
    <p>{{ $product->Specification }}</p>
    <p>{{ $product->SellingPrice }}</p>


    
    <form action={{ route('buynow') }} method="POST">
        @csrf
    <label for="">Quantity</label>

    <input type="number" value="1" name="quantity">
    
    <input type="hidden" name="productID" value="{{ $product->ProductID }}">
    <input type="hidden" name="customerID" value="{{ $customerID }}">

    {{--  Dati
    <input type="hidden" name="productID" value="{{ $product->ProductID }}">
    <input type="hidden" name="name" value="{{ $product->Name }}">
    <input type="hidden" name="brand" value="{{ $product->Brand }}">
    <input type="hidden" name="category" value="{{  $product->Category }}">
    <input type="hidden" name="specification" value="{{ $product->Specification }}">
    <input type="hidden" name="sellingprice" value="{{ $product->SellingPrice }}">
    <input type="hidden" name="customerID" value="{{ $customerID }}"> --}}
    <br>
    <button>Buy now</button>

    <br>
    <br>
    
    </form> 
   

   <form method="POST" action={{ route('addtocart') }}>
    @csrf
    <input name="productID" type="hidden" value="{{ $product->ProductID }}">
    <input name="customerID" type="hidden" value="{{ $customerID }}">

   
    <button>
    Add to Cart
    </button>

    </form>
    


</div>



@else

<div>

    <h2>{{ $product->Name }}</h2>
    <p>{{ $product->Brand }}</p>
    <p>{{ $product->Category }}</p>
    <p>{{ $product->Specification }}</p>
    <p>{{ $product->SellingPrice }}</p>

</div>


@endif




@endsection