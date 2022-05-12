@extends('layouts.eCommCustomerui')


@section('content')



<div class="container" style="height: 130%">
  

    <div class="row" style="margin-top: 40px; height: 100%; ">


        <div class="col-sm-5 col-md-8">
            <div class="cartitem" style="height: 400px; width: 100%;">

                @foreach ($mycart as $mycarts)


                <div class="carthorizontal" style="height: 300px; margin-bottom: 10px; width: 100%; border: 0.5px solid;">
                    <p style="padding-left: 40px; padding-top: 10px;">
                        Product
                    </p>

                    <div class="row" style="float: right; margin-right: 10px;">
                        <div class="col">
                            
                            <form action="{{ route("removeCart") }}" method="post">

                                @csrf

                                <input type="hidden" name="cartID" value="{{ $mycarts->CartID }}">
                                <button class="btn btn-danger">X</button>
                    
                            </form>

                        </div>
                    </div>

                    <div class="row">

                    
                    <div class="col-sm-5 col-md-4">

                        <div class="card" style="height: 150px; margin-left: 40px; ">

                        </div>

                    </div>


                    <div class="col-sm-5 col-md-5">

                    <p style="padding-left: 40px;">
                        Name: {{ $mycarts->product->Name }}
                    </p>

                    <p style="padding-left: 40px;">
                        Brand: {{ $mycarts->product->Brand }}
                    </p>

                    <p style="padding-left: 40px;">
                        Category: {{ $mycarts->product->Category }}
                    </p>

                    <p style="padding-left: 40px;">
                        Available Stock: {{ $mycarts->product->storestock->AvailableStock }}
                    </p>

                    <p>
                        Quantity:  <button onclick="sub()" class="">-</button><input id="quan" type="number" style="width: 40px;" value="{{ $mycarts->CartQuantity }}"><button onclick="add()" class="">+</button>
                    </p>


                    <script>   

                         var i = 0; 
                        function add()
                        {
                            var val = document.getElementById("quan").value;

                            if(val == 20)
                            {
                                console.log("stop");
                            }
                            else
                            {
                                document.getElementById("quan").value = ++i;
                            }
                            
                        }

                        function sub()
                        {
                            var val = document.getElementById("quan").value;

                            if(val == 0)
                            {
                                console.log("stop");
                            }
                            else
                            {
                                document.getElementById("quan").value = --i;
                            }
                           
                        }
                    </script>

                    </div>

                </div>

                </div>

                @endforeach

              


                {{-- <p>{{ $mycarts->product->Name }}</p>
                <p>{{ $mycarts->product->Brand }}</p>
                <p>{{ $mycarts->product->Category }}</p> --}}
                    
          


            </div>
        </div>

        <div class="col-sm-5 col-md-4">
            <div class="cartitem" style="height: 200px; width: 100%; border: 0.5px solid; text-align: center; ">
                <p style="padding-top: 20px;">
                    Cart total
                </p>

                <form action="{{ route('mycartcheckouts') }}" method="post">

                    @csrf

                    @foreach ($mycart as $mycarts)


                        <p>Sub Total: {{ $mycarts->CartPrice*$mycarts->CartQuantity }}</p>

                        <input type="hidden" name="productID[]" value="{{ $mycarts->product->ProductID}}" >

    
                        <input type="hidden" name="quantity[]" value="{{ $mycarts->CartQuantity }}" >

                        <input type="hidden" name="subtotal[]" value="{{ $mycarts->CartPrice*$mycarts->CartQuantity }}" >



                        {{-- <input type="text" name="name[]" value="{{ $mycarts->product->Name }}" >
                        <input type="text" name="brand[]" value="{{ $mycarts->product->Brand }}" >
                        <input type="text" name="category[]" value="{{ $mycarts->product->Category }}" >
                        <input type="text" name="specification[]" value="{{ $mycarts->product->Specification }}" >
                        <input type="text" name="sellingprice[]" value="{{ $mycarts->product->SellingPrice }}" >
                        <input type="text" name="quantity[]" value="{{ $mycarts->CartQuantity }}" > --}}
                    @endforeach
                        <button class="btn btn-primary">checkout</button>

                 </form>

            </div>
        </div>


    </div>




  


</div>




@endsection