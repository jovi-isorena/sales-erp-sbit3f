@extends('./layouts.eCommCustomerui')


@section('content')




<h4>Products</h4>

<div class="container">

@foreach ($getProduct as $product )


<h4> {{ $product->Name }} </h4>
<h4> {{ $product->Brand }} </h4>
<h4> {{ $product->Category }} </h4>
<h4> {{ $product->Specification }} </h4>
<h4> {{ $product->SellingPrice }} </h4>

<button>Buy</button>


     
@endforeach

</div>

<x-flash-messages/>

<h1>E-commerce Homepage</h1>

<ul>
    <li><a href="{{ route('employeePortal') }}">Employee Portal</a></li>
</ul>
