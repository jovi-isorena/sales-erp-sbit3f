@extends('layouts.eCommCustomerui')


@section('content')



<div style="height: 100vh; width: 100%; margin-top: 50px;">

  <div class="row">
  
      <div class="col-sm-5 col-md-2">
          
          <div class="side" style="margin-left: 30px;">
          
                <label><a href="{{ route('myorderspending') }}"> Pending orders </a> </label>
                <br>
                <label><a href="{{ route('myordersshipped') }}"> Ship orders </a></label>
                <br>
                <label> <a href="{{ route('myordersreceived') }}"> Receive orders </a> </label>
                <br>
                <label> <a href="{{ route('myorderscompleted') }}"> Completed orders </a> </label>
          
          </div>

      </div>
  
          <div class="col-sm-5 col-md-8">

            {{-- @foreach ($myorder as $myorders )
             
            @endforeach  --}}

            <div class="row">

            
              
              <div class="card " onclick="window.location.href='{{ route('myorderspending') }}'" style="width: 100px; height: 100px; margin-right: 40px;"> 
                  <p>Pending</p>    
                  <h3> {{ $myorder->where('OrderStatus', 'Pending')->count()  }} </h3>
              </div>
      
              <div class="card " onclick="window.location.href='{{ route('myordersshipped') }}'" style="width: 100px; height: 100px; margin-right: 40px;"> 
                  <p >Shipping</p>
                  <h3 > {{ $myorder->where('OrderStatus', 'To Ship')->count()  }} </h3>
              </div>
      
              <div class="card" onclick="window.location.href='{{ route('myordersreceived') }}'" style="width: 100px; height: 100px; margin-right: 40px;"> 
                  <p  >Receive</p>
                  <h3  > {{ $myorder->where('OrderStatus', 'To Receive')->count()  }} </h3>
              </div>
      
              <div class="card" onclick="window.location.href='{{ route('myorderscompleted') }}'" style="width: 100px; height: 100px; margin-right: 40px;"> 
                  <p  >Complete</p>
                  <h3  > {{ $myorder->where('OrderStatus', 'Completed')->count()  }} </h3>
              </div>
              
          </div>

          

            
            <table class="table" style="width: 100%; margin-top: 50px;">
              <thead>
                  <tr>
                      <th>
                          <p>Order ID</p>
                      </th>
                      
                      <th>
                          <p>Customer ID</p>
                      </th>
          
                      <th>
                          <p>Total amount</p>
                      </th>
                      
                      <th>
                          <p>Shipping Address</p>
                      </th>
                      
                      <th>
                          <p>Payment Method</p>
                      </th>
  
                      <th>
                          <p>Status</p>
                      </th>
                  </tr>
              </thead>
              
              <tbody>
      
                  @foreach ($myorder as $myorders )
    
                  <tr>
  
                      <td>
                          <p> {{ $myorders->OrderID  }} </p>

                        
                      </td>
  
                      <td>
                          <p> {{ $myorders->CustomerID }} </p>
                      </td>
  
                      <td>
                          <p> {{ $myorders->TotalAmount }} </p>
                      </td>
  
                      <td>
                          <p> {{ $myorders->ShippingAddress }} </p>
                      </td>
  
                      <td>
                          <p> {{ $myorders->PaymentMethod }} </p>
                      </td>
  
                      <td>
                          <p> {{ $myorders->OrderStatus }} </p>
                      </td>
  
                  </tr>
  
                  @endforeach
  
              </tbody>
          
          
          </table>
  


          </div>

  </div>

</div>




{{-- 
<div class="container">
   @auth

  <div class="row" style="margin-top: 50px;">
      <div class="col-sm-5 col-md-2">
        <p><a href="{{ route('myorderspending') }}"> Pending orders </a> </p>
    
        <p><a href="{{ route('myordersshipped') }}"> Ship orders </a></p>
       
        <p> <a href="{{ route('myordersreceived') }}"> Receive orders </a> </p>

        <p> <a href="{{ route('myorderscompleted') }}"> Completed orders </a> </p>
       
      </div>

      <div class="col-sm-5 col-md-6">
      


      </div>
  </div>

    @endauth

</div> --}}



@endsection