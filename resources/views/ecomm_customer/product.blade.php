@extends('layouts.eCommCustomerui')


@section('content')




<div class="container" >

    <div class="row" style=" height: 100%; width: 100%;" >

        <div class="col-sm-5 col-md-6">
            
            <div class="card" style="height: 400px; width: 400px; margin-top: 50px; border: 1px solid; ">

                
            
            </div>

        </div>

        <div class="col-sm-5 col-md-4">
            
            <div class="" style="height: 500px; width: 500px; margin-top: 50px; text-align: left;">

                <div class="textCon" style="margin-top: 40px;">
                    <h2>{{ $product->Name }}</h2>
                    <br>
                    <br>
                    <p>Brand: {{ $product->Brand }}</p>
                    <p>Category: {{ $product->Category }}</p>
                    <p>Specification: {{ $product->Specification }}</p>
                    <p>Price: {{ $product->SellingPrice }}</p>
                    <p>Available Stock: {{ $product->storestock->AvailableStock }}</p>


                    <div class="row" style=" display:flex;">

                    <form style="width: 40%;" action={{ route('buynow') }} method="POST">
                        @csrf


                    <a class="btn btn-xs" onclick="sub()" style="border: 1px solid;">-</a><input onchange="change()" id="quan1" value="1" type="number" style="width:30px;" name="quantity" ><a class="btn btn-xs" onclick="add()" style="border: 1px solid">+</a> 
               
                    <input type="hidden" name="productID" value="{{ $product->ProductID }}">
                    <input type="hidden" name="customerID" value="{{ $customerID }}">

                    <button class="btn btn-primary">Buy now</button>

                    </form>


                    
   <form style="width: 50%;" method="POST" action={{ route('addtocart') }}>
    @csrf
    <input type="hidden" value="1" name="quantity" id="quan2" >
    <input name="productID" type="hidden" value="{{ $product->ProductID }}">
    <input name="customerID" type="hidden" value="{{ $customerID }}">

   
    <button class="btn btn-primary">
    Add to Cart
    </button>

    </form>
    
    {{-- <script>
            // function change()
            // {
            //     var quan = document.getElementById("quan1").value;

            //     document.getElementById("quan2").value = quan;
            // }
    </script> --}}


                    <script>   

                        var i = 0; 
                       function add()
                       {
                           var val = document.getElementById("quan1").value;
                           
                           if(val == 20)
                           {
                               console.log("stop");
                           }
                           else
                           {

                               
                             var vals = document.getElementById("quan1").value = ++i;
                               document.getElementById("quan2").value = vals;
                               
                           }
                           
                       }

                       function sub()
                       {
                           var val = document.getElementById("quan1").value;

                           if(val == 0)
                           {
                               console.log("stop");
                           }
                           else
                           {
                             var vals = document.getElementById("quan1").value = --i;
                               document.getElementById("quan2").value = vals;
                           }
                          
                       }
                   </script>
</div>
               
               
                </div>

              
            
            </div>

        </div>

    </div>

</div>








@endsection