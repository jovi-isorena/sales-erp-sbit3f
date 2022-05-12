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
        
                    @foreach ($myorderPending as $myorderPendings)
      
                    <tr>
    
                        <td>
                            <p> {{ $myorderPendings->OrderID  }} </p>
                        </td>
    
                        <td>
                            <p> {{ $myorderPendings->CustomerID }} </p>
                        </td>
    
                        <td>
                            <p> {{ $myorderPendings->TotalAmount }} </p>
                        </td>
    
                        <td>
                            <p> {{ $myorderPendings->ShippingAddress }} </p>
                        </td>
    
                        <td>
                            <p> {{ $myorderPendings->PaymentMethod }} </p>
                        </td>
    
                        <td>
                            <p> {{ $myorderPendings->OrderStatus }} </p>
                        </td>
    
                    </tr>
    
                    @endforeach
    
                </tbody>
            
            
            </table>
    
    

        </div>

    </div>

</div>




@endsection