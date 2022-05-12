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

          <table class="table" style="width: 100%;">
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
      
                
                @foreach ($myorderToReceive as $myorderToReceives)
    
                  <tr>
  
                      <td>
                          <p> {{ $myorderToReceives->OrderID  }} </p>
                      </td>
  
                      <td>
                          <p> {{ $myorderToReceives->CustomerID }} </p>
                      </td>
  
                      <td>
                          <p> {{ $myorderToReceives->TotalAmount }} </p>
                      </td>
  
                      <td>
                          <p> {{ $myorderToReceives->ShippingAddress }} </p>
                      </td>
  
                      <td>
                          <p> {{ $myorderToReceives->PaymentMethod }} </p>
                      </td>
  
                      <td>
                           <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                              Receive
                            </button>
                      </td>
  
                  </tr>

                  
          <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h5>Are you sure you want to receive?</h5>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                
                
                    
                      <form action="{{ route('myordersReceive') }}" method="post">
                          @csrf
                          <input type="hidden" name="orderID" value="{{ $myorderToReceives->OrderID }}">
                          <button class="btn btn-primary">Yes</button>
                      </form>
                
                  </div>
                </div>
              </div>
            </div>
  
                  @endforeach
  
              </tbody>
          
          
          </table>



            
  

      </div>

  </div>

</div>




{{-- 



@foreach ($myorderToReceive as $myorderToReceives)
  
<h2>{{ $myorderToReceives->OrderStatus  }}</h2>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Receive
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
          <h5>Are you sure you want to receive?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      
      
          
            <form action="{{ route('myordersReceive') }}" method="post">
                @csrf
                <input type="hidden" name="orderID" value="{{ $myorderToReceives->OrderID }}">
                <button class="btn btn-primary">Yes</button>
            </form>
      
        </div>
      </div>
    </div>
  </div> 

  

@endforeach

--}}



@endsection