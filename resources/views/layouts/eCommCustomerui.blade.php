<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<div class="nav">
    <nav>
        <ul>
            <li><a href="{{ route('home') }}" > Home </a> </li>

            
          
           
           
          
       


          
           

           <li> <a href="{{ route('ecommregister') }}" > Register </a> </li>
        <li> <a href="{{ route('ecommlogin') }}" > Login  </a> </li>
     
        </ul>
    </nav>
</div>



<body>
    

@yield('content')


</body>
</html>