@extends('layouts.eCommCustomerui')


@section('content')



@auth


@if($customerID)





<h4>Products</h4>
<div class="container">



    @foreach ($getProduct as $product )

{{-- 
    {{ $prodID = $product->ProductID }} --}}

    <h4> {{ $product->ProductID }} </h4>
   <h4> {{ $product->Name }} </h4>
   <h4> {{ $product->Brand }} </h4>
   <h4> {{ $product->Category }} </h4>
   <h4> {{ $product->Specification }} </h4>
   <h4> {{ $product->SellingPrice }} </h4>

   
   {{-- <form method="POST" action={{ route('addtocart') }}>

    <input name="productID" type="text" value="{{ $product->ProductID }}">
    <input name="customerID" type="text" value="{{ $customerID }}">

    @csrf
    <button>
    Add to Cart
    </button>
    </form> --}}
    
    <br>

   
    <form method="POST" action={{ route('product') }}>

        <input name="productID" type="text" value="{{ $product->ProductID }}">
    
        @csrf
        <button>
        Buy
        </button>
        </form>
         
    @endforeach






@else


<h4>Products</h4>

@foreach ($getProduct as $product )

<h4> {{ $product->ProductID }} </h4>
<h4> {{ $product->Name }} </h4>
<h4> {{ $product->Brand }} </h4>
<h4> {{ $product->Category }} </h4>
<h4> {{ $product->Specification }} </h4>
<h4> {{ $product->SellingPrice }} </h4>


         
@endforeach



</div>





@endif

 
@endauth






@endsection