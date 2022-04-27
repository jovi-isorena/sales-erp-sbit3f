@extends('layouts.eCommCustomerui')


@section('content')



<div class="container">

    

<div>
    <a href="{{ route('myordersview') }}">My Orders</a>
    <br>
    <p>
    <a href="">To pay() </a>
    <a href="">To Ship()</a>
    <a href="">To Deliver()</a>
    <a href="">Complete()</a>
    </p>
    
</div>


    <h4>Personal Information. </h4>


    @auth

    
    <p>Firstname:   {{ auth()->user()->customer->FirstName }}</p>
   
    <p>Middlename:   {{ auth()->user()->customer->MiddleName }}</p>
   
    <p>Lastname:   {{ auth()->user()->customer->LastName }}</p>

    <p>Suffix:   {{ auth()->user()->customer->Suffix }}</p>

    <p>Birthdate:   {{ auth()->user()->customer->Birthdate }}</p>


    <h4>Contact Information.</h4>

    <p>Mobile:   {{ auth()->user()->customer->Mobile }}</p>

    <p>Email:   {{ auth()->user()->customer->Email }}</p>












@if($getaddressID->CustomerID)
  
<h4>Location</h4>


<p>Address: {{ $getaddressID->Address }}</p>
<p>Barangay: {{ $getaddressID->Barangay }}</p>
<p>City: {{ $getaddressID->City }}</p>
<p>Zip: {{ $getaddressID->Zip }}</p>
        
               
       



@else
 
<h4>Upgrade your account?</h4>


<form action="{{ route('upgradeAccount') }}" method="POST" >
    @csrf

    <input name="id" type="hidden" value="{{ auth()->user()->customer->CustomerID }}">

    <label for="">Type:</label>
    <select name="type" id="">
        <option value="home">Home</option>
        <option value="work">Work</option>
    </select>
    <br>
    <label for="">Address:</label> <input name="address" type="text">
    <br>
    <label for="">Barangay:</label> <input name="barangay" type="text">
    <br>
    <label for="">City:</label> <input name="city" type="text">
    <br>
    <label for="">Zip:</label> <input name="zip" type="text">
    <br>
    <button>Upgrade</button>
</form>
  
@endif
     
    @endauth


</div>



@endsection