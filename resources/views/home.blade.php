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


<h1>E-commerce Homepage</h1>
<ul>
    <li><a href="{{ route('adminlogin') }}">Admin Portal</a></li>
    <li><a href="{{ route('inventorylogin') }}">Inventory Portal</a></li>
    <li><a href="{{ route('ecommercelogin') }}">Order Management Portal</a></li>
    <li><a href="{{ route('crmlogin') }}">CRM Portal</a></li>
</ul>





@endsection