@extends('layouts.eCommCustomerui')


@section('content')



<div class="container card" style="text-align: center; margin-top: 30px;  width: 500px;">


    <div class="row">
        <h3 style="padding-top: 50px;">Login</h3>
    </div>

    <div class="form">
        <form action="{{ route('loginCustomer') }}" method="POST" >
        @csrf
            
            <br>
            <br>

            <input type="text" name="email" placeholder="Email">
            <br>
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <br>
            <button class="btn btn-primary">Login</button>


            <p style="padding-top: 50px;"></p>



        </form>
    </div>

</div>



@endsection