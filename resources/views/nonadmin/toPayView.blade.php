@extends('layouts.ordermanager')

@section('content')



<div style="height: 100vh; width: 100%;">

 
<div class="row">
            <div class="col-sm-5 col-md-2">
                    
                <div class="side">

                    <label for=""> <a style="color:red;" href="{{ route('toPayPage') }}"> To Pay </a></label>
                    <br>
                    <label for=""> <a href="{{ route('toShipPage') }}"> To Ship </a></label>
                    <br>
                    <label for=""> <a href="{{ route('toDeliverPage') }}"> To Receive </a></label>
                    <br>
                    <label for=""> <a href="{{ route('CompletedOrderPage') }}"> Completed </a></label>
                
                </div>
            
            </div>



            <div  class="col-sm-5 offset-sm-2 col-md-10 offset-md-0">
            
                <div class="row">
                    <div style="width: 100%; height: 50px; border: 1px solid;">
                        <h4>
                            View Order Details
                        </h4>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;">
                
                <div class="row">
                        <h5>Customer</h5>
                        <hr>

                        <p>Name: {{ $order->customer->first()->FirstName }}  {{ $order->customer->first()->LastName }}</p>

                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-6">
                <h5>Order</h5>

                <hr>
                
                <p>ID: {{ $order->OrderID }}</p>
                
                <p>Shipping Address: {{ $order->ShippingAddress  }} </p>

                <p>Payment Method: {{ $order->PaymentMethod   }} </p>

                <p>Ordered Date: {{ $order->OrderedDate   }} </p>

                <p>Ordered Received: {{ $order->ReceivedDate   }} </p>

                <p>Ordered Status: {{ $order->OrderStatus  }} </p>

               
                <p>Total Amount: {{ $order->TotalAmount  }} </p>
                    </div>

                    <div class="col-sm-5 col-md-6">


                      
                        <h5>Product</h5>

                        <hr>

{{-- 
                        <p>ID: {{  $product->ProductID }}</p>
        
                        <p>Name: {{ $product->Brand }}</p>
                        <p>Category: {{ $product->Category }}</p>
                        <p>Specification: {{ $product->Specification }}</p>
                        <p>Selling Price: {{ $product->SellingPrice }}</p> --}}

                   

                         @foreach ($orderditems as $orderditemss)

                            <p>Name: {{ $orderditemss->product->Name }}</p>
                            <p>Brand: {{ $orderditemss->product->Brand }}</p>
                            <p>Category: {{ $orderditemss->product->Category }}</p>
                            <p>Specification: {{ $orderditemss->product->Specification }}</p>
                            <p>Selling Price: {{ $orderditemss->product->SellingPrice }}</p>
                        
                            <hr>
                         @endforeach 
{{-- 
                        @foreach ($product as $orderditemnss)

                            <p>{{ $orderditemnss->Name }}</p>

                        @endforeach --}}




                    </div>
            


                </div>

                {{-- <div class="row">

                    <form action="{{ route('toshipped') }}" method="POST">

                        @csrf

                    <input type="hidden" name="orderID" value="{{ $order->OrderID }}">

                    <button>To Ship</button>

                    </form>

                </div> --}}


                <div class="row">
                       <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    To Ship
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5>Are you sure this order is to ship?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      
      
         
          <form action="{{ route('toshipped') }}" method="POST">

            @csrf

          <input type="hidden" name="orderID" value="{{ $order->OrderID }}">

        

            <button class="btn btn-primary">Yes</button>

            </form>
         
      
        </div>
      </div>
    </div>
  </div>

                </div>
               
 

           



{{-- 
                    <p>Quantity: {{ $order->ordereditems->first()->Quantity }}</p> --}}

                </div>





            </div>

</div>

</div>





@endsection
