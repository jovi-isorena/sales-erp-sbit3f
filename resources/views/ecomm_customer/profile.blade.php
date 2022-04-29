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

    
    <p>Firstname:   {{ $customer->FirstName }}</p>
   
    <p>Middlename:   {{ $customer->MiddleName }}</p>
   
    <p>Lastname:   {{ $customer->LastName }}</p>

    <p>Suffix:   {{ $customer->Suffix }}</p>

    <p>Birthdate:   {{ $customer->Birthdate }}</p>


    <h4>Contact Information.</h4>

    <p>Mobile:   {{ $customer->Mobile }}</p>

    <p>Email:   {{ $customer->Email }}</p>












@if($customer->customeraddresses->count() > 0)
  
<h4>Location</h4>


{{-- <p>Address: {{ $customer->customeraddresses->first()->Address }}</p>
<p>Barangay: {{ $customer->customeraddresses->first()->Barangay }}</p>
<p>City: {{ $customer->customeraddresses->first()->City }}</p>
<p>Zip: {{ $customer->customeraddresses->first()->Zip }}</p> --}}
        
@foreach ($customer->customeraddresses as $address)
<p>Address: {{ $address->Address }}</p>
<p>Barangay: {{  $address->Barangay }}</p>
<p>City: {{  $address->City }}</p>
<p>Zip: {{  $address->Zip }}</p>
@endforeach               
       



@else
 
<h4>Upgrade your account?</h4>


<form action="{{ route('upgradeAccount') }}" method="POST" >
    @csrf

    <input name="id" type="hidden" value="{{ $customer->CustomerID }}">

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