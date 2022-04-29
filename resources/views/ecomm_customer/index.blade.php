@extends('layouts.eCommCustomerui')


@section('content')



@auth


@if($customerID)



<div class="mx-auto" style="width: 98%; height: 100px; margin-top: 50px;">

<div class="row" >
    <center>
    <h4>Products</h4>
    </center>
</div>

<div class="row" style="margin-top: 40px;">

  
    
    @foreach ($getProduct as $product )
    
  
  
    <div class="card" style="width: 18rem; margin-right: 20px;">
        <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Name: {{ $product->Name }}</p>
          <p class="card-text">Brand: {{ $product->Brand }}</p>
          <p class="card-text">Brand: {{ $product->Category }}</p>
          <p class="card-text">Brand: {{ $product->Price }}</p>
        
          <form method="POST" action={{ route('product') }}>
            @csrf
          <input name="productID" type="hidden" value="{{ $product->ProductID }}">
        
          <button class="btn-primary">Buy</button>

        </form>
        </div>
      </div>

@endforeach

</div>

</div>









{{-- <h4>Products</h4>
<div class="container">



    @foreach ($getProduct as $product ) --}}

{{-- 
    {{ $prodID = $product->ProductID }} --}}

    {{-- <h4> {{ $product->ProductID }} </h4>
   <h4> {{ $product->Name }} </h4>
   <h4> {{ $product->Brand }} </h4>
   <h4> {{ $product->Category }} </h4>
   <h4> {{ $product->Specification }} </h4>
   <h4> {{ $product->SellingPrice }} </h4> --}}

   
   {{-- <form method="POST" action={{ route('addtocart') }}>

    <input name="productID" type="text" value="{{ $product->ProductID }}">
    <input name="customerID" type="text" value="{{ $customerID }}">

    @csrf
    <button>
    Add to Cart
    </button>
    </form> --}}
{{--     
    <br>

   
    <form method="POST" action={{ route('product') }}>

        <input name="productID" type="text" value="{{ $product->ProductID }}">
    
        @csrf
        <button>
        Buy
        </button>
        </form>
         
    @endforeach --}}






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