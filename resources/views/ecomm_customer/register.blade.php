@extends('layouts.eCommCustomerui')


@section('content')



<div class="card container" style=" text-align: center; margin-top: 30px;  width: 500px;">


    <div class="row">
        <h3 style="padding-top: 50px;">Personal Information</h3>
       
    </div>



    <div class="form">

        <form action="{{ route('createUser') }}" method="POST" enctype="multipart/form-data">
             @csrf
            
         
            <br>
            <label for="">Profile Image</label>
            <br>
            <input type="file" name="customerImg" value="{{ old('customerImg') }}">
            <br>
            <br>

       
                     <input type="text" name="firstname" placeholder="Firstname" value="{{ old('firstname') }}">
                     @error('firstname')
                     <p style="color: red;">
                         {{ $message }}
                     </p>
                     @enderror
            <br>
            <br>

                     <input type="text" name="middlename" placeholder="Middlename" value="{{ old('middlename') }}">
                     @error('middlename')
                     <p style="color: red;">
                         {{ $message }}
                     </p>
                     @enderror
            <br>
            <br>

                     <input type="text" name="lastname" placeholder="Lastname" value="{{ old('lastname') }}"> 
                     @error('lastname')
                     <p style="color: red;">
                         {{ $message }}
                     </p>
                     @enderror
            <br>
            <br>

                     <input type="text" name="suffix" placeholder="Suffix" value="{{ old('suffix') }}">
                     @error('suffix')
                     <p style="color: red;">
                         {{ $message }}
                     </p>
                     @enderror
                     <br>
                     <br>

            <label for="">Birthdate</label>
            <br>
            <input type="date" name="birthdate" value="{{ old('birthdate') }}">
            @error('birthdate')
            <p style="color: red;">
                {{ $message }}
            </p>
            @enderror

            <br>

          
            
                <br>
                <br>

                <h3>User Information</h3>


                <br>
                <input type="number" name="mobile" placeholder="Mobile Number" value="{{ old('mobile') }}">
                @error('mobile')
                <p style="color: red;">
                    {{ $message }}
                </p>
                @enderror
                <br>
                <br>

                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                @error('email')
                <p style="color: red;">
                    {{ $message }}
                </p>
                @enderror

                <br>
                <br>
                <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                @error('password')
                <p style="color: red;">
                    {{ $message }}
                </p>
                @enderror
                <br>
                <br>
                <input type="password" name="confirmPassword" placeholder="Confirm Password" value="{{ old('confirmPassword') }}">
                @error('confirmPassword')
                <p style="color: red;">
                    {{ $message }}
                </p>
                @enderror
                <br>
                <br>
                <button >Sign in</button>
    
    

            <p style="padding-bottom: 50px;"></p>

        </form>

    </div>



</div>



@endsection