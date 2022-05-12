@extends('layouts.eCommCustomerui')


@section('content')



<div class="container">


    
    <div class="container" style="margin-top: 40px;">

        <div class="row">

            <div class="col-sm-5 col-md-5">
                
                <div class="card" style="width: 300px; height: 300px; ">

                
                    <img src="{{ asset('ecomm_CustomerDP/'.$customer->Image) }}" alt="">
                   

                </div>
            

            </div>

            <div class="col-sm-5 col-md-6">
                
    <h4>Personal Information. </h4>


    @auth

    
    <p>Firstname:   {{ $customer->FirstName }}</p>
   
    <p>Middlename:   {{ $customer->MiddleName }}</p>
   
    <p>Lastname:   {{ $customer->LastName }}</p>

    <p>Suffix:   {{ $customer->Suffix }}</p>

    <p>Birthdate:   {{ $customer->Birthdate }}</p>

    <br>
    <br>

    <h4>Contact Information.</h4>

    <p>Mobile:   {{ $customer->Mobile }}</p>

    <p>Email:   {{ $customer->Email }}</p>



<br>
<br>








@if($customer->customeraddresses->count() > 0)
  
<h4>Location.</h4>


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
    <br>
    <select name="type" id="">
        <option value="home">Home</option>
        <option value="work">Work</option>
    </select>
    <br>
    <label for="">Address:</label>
    <br>
    <input name="address" type="text" value="{{ old('address') }}">
    @error('address')
    <p style="color: red;">
        {{ $message }}
    </p>
    @enderror
    <br>
    <label for="">Barangay:</label> 
    <br>
    <input name="barangay" type="text" value="{{ old('barangay') }}">
    @error('barangay')
    <p style="color: red;">
        {{ $message }}
    </p>
    @enderror
    <br>
    <label for="">City:</label>
    <br>
    <input name="city" type="text" value="{{ old('city') }}" >
    @error('city')
    <p style="color: red;">
        {{ $message }}
    </p>
    @enderror
    <br>
    <label for="">Zip:</label>
    <br>
    <input name="zip" type="text" value="{{ old('zip') }}">
    @error('zip')
    <p style="color: red;">
        {{ $message }}
    </p>
    @enderror
    <br>
    <br>
    <button class="btn btn-primary">Upgrade</button>
</form>
  
@endif
     
    @endauth


            </div>

        </div>

    </div>
    



{{-- 
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
 --}}

{{-- <p>Address: {{ $customer->customeraddresses->first()->Address }}</p>
<p>Barangay: {{ $customer->customeraddresses->first()->Barangay }}</p>
<p>City: {{ $customer->customeraddresses->first()->City }}</p>
<p>Zip: {{ $customer->customeraddresses->first()->Zip }}</p> --}}
     
{{-- 
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
 --}}




@endsection