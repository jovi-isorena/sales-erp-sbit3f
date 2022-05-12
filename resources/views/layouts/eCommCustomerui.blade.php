
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <script src="https://kit.fontawesome.com/22e96e7343.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="#">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">




        @auth


          <li class="nav-item active">
            <a class="nav-link" href="{{ route('customerHome') }}">Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('ecommprofile') }}">Profile</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('myordersview') }}">My Orders</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('mycartview') }}">My Cart</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logoutCustomer') }}">Logout</a>
          </li>

       

         @else


        

        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('ecommregister') }}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('ecommlogin') }}">Login</a>
        </li>

        @endauth


    
      </ul>
    </div>


       
  </nav>

{{-- 
<div class="nav">
    <nav>
        <ul>
          


           @auth

           <li><a href="{{ route('customerHome') }}" > Home </a> </li>

           <li> <a href="{{ route('ecommprofile') }}"> Profile </a></li>

           <li> <a href="{{ route('logoutCustomer') }}"> Logout </a></li>
           

           @else
           
           <li><a href="{{ route('home') }}" > Home </a> </li>

    
           
           <li> <a href="{{ route('ecommregister') }}" > Register </a> </li>
        
           <li> <a href="{{ route('ecommlogin') }}" > Login  </a> </li>

           @endauth
       



     
        </ul>
    </nav>
</div> --}}



<body>
    

@yield('content')




<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      
      @auth

      <li class="nav-item"><a href="{{ route('customerHome') }}" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="{{ route('ecommprofile') }}" class="nav-link px-2 text-muted">Profile</a></li>
      <li class="nav-item"><a href="{{ route('logoutCustomer') }}" class="nav-link px-2 text-muted">Logout</a></li>
    

      @else
        
     
      <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="{{ route('ecommregister') }}" class="nav-link px-2 text-muted">Register</a></li>
      <li class="nav-item"><a href="{{ route('ecommlogin') }}" class="nav-link px-2 text-muted">Login</a></li>
      <li class="nav-item"><a href="{{ route('employeePortal') }}" class="nav-link px-2 text-muted">Employee Portal</a></li>
     
      @endauth

    
    </ul>
    <p class="text-center text-muted">&copy; 2022 3Gency, Inc</p>
  </footer>
</div>


</body>
</html>