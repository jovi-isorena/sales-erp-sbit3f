@extends('layouts.eCommCustomerui')


@section('content')



<div class="container">



    <div class="form">

        <form action="{{ route('createUser') }}" method="POST" enctype="multipart/form-data">
             @csrf
            
            
            <label for="">Personal Information</label>
            <br>
            <label for="">Profile Image</label> <input type="file" name="customerImg">
            <br>
            <label for="">FirstName</label> <input type="text" name="firstname">
            <br>
            <label for="">Middlename</label> <input type="text" name="middlename">
            <br>
            <label for="">Lastname</label> <input type="text" name="lastname">
            <br>
            <label for="">Suffix</label> <input type="text" name="suffix">
            <br>
            <label for="">Birthdate</label> <input type="date" name="birthdate">
            <br>
            <label for="">User Information</label>
            <br>
            <label for="">Mobile number</label> <input type="number" name="mobile">
            <br>
            <label for="">Email</label> <input type="email" name="email">
            <br>
            <label for="">Password</label> <input type="password" name="password">
            <br>
            <label for="">Confirm Password</label> <input type="password" name="confirmPassword">
            <br>

            <button>Sign in</button>

        </form>

    </div>



</div>



@endsection