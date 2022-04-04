@extends('layouts.eCommCustomerui')


@section('content')



<div class="container">
    
    <div class="form">
        <form action="{{ route('loginCustomer') }}" method="POST" >
        @csrf
            <label for="">Email</label><input type="text" name="email">
            <br>

            @error('email')
            <p>
                {{ $message }}
            </p>
            @enderror

            <label for="">Password</label><input type="password" name="password">
            <br>
            <button>Login</button>


     



        </form>
    </div>

</div>



@endsection