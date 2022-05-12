@extends('layouts.eCommCustomerui')


@section('content')


<div class="container" style="width: 98%; height: 900%; margin-top: 50px;">

<div class="row">

        <center>
            <h4>Products</h4>
        </center>

</div>

<div class="row" style="margin-top: 40px;">

    
    @foreach ($getProduct as $product )
    
  
  
    <div class="card" style="width: 18rem; margin-left:40px; margin-right: 20px; margin-bottom: 40px; ">
       
        <div class="card-body">
          <p class="card-text">Name: {{ $product->Name }}</p>
          <p class="card-text">Brand: {{ $product->Brand }}</p>
          <p class="card-text">Brand: {{ $product->Category }}</p>
          <p class="card-text">Brand: {{ $product->SellingPrice }}</p>
        
        
          <button class="btn-primary">Buy</button>

        


        </div>
      </div>

@endforeach
  
</div>




</div>






<x-flash-messages/>



@endsection