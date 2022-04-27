@extends('layouts.eCommCustomerui')


@section('content')



<div class="container">
   @auth

   <h1>Pending Orders</h1>


   @foreach ($myorderPending as $myordersPending )

   {{ $myordersPending->OrderStatus }}

  
   @endforeach



   <h1>To Ship Orders</h1>

   @foreach ($myorderToShip as $myordersToShip )

   {{ $myordersToShip->OrderStatus }}

  
   @endforeach

   <h1>To Receive Orders</h1>

   @foreach ($myorderToReceive as $myordersToReceive )

   {{ $myordersToReceive->OrderStatus }}

  
   @endforeach



   


   
    @endauth
</div>



@endsection