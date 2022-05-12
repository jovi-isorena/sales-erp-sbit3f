@extends('layouts.ordermanager')

@section('content')


<div style="height: 100vh; width: 100%;">

    <div class="row">
        <div class="col-sm-5 col-md-2">
            
            <div class="side">

                <label for=""> <a href="{{ route('toPayPage') }}"> To Pay </a></label>
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
                        Manage Orders
                    </h4>
                </div>
            </div>

            <div class="row " style="margin-top: 30px;">
   
                <div class="card" onclick="window.location.href='{{ route('toPayPage') }}'" style="width: 100px; height: 100px; margin-right: 40px;"> 
                    <p>To Pay</p>
                    
                    <h3>{{ $data->where('OrderStatus', 'Pending')->count() }}</h3>
                </div> 
                <div class="card " onclick="window.location.href='{{ route('toShipPage') }}'" style="width: 100px; height: 100px; margin-right: 40px;"> 
                    <p>To Ship</p>
                    <h3>{{ $data->where('OrderStatus', 'To Ship')->count() }}</h3>
                </div>
                <div class="card" onclick="window.location.href='{{ route('toDeliverPage') }}'" style="width: 100px; height: 100px; margin-right: 40px;"> 
                    <p>To Deliver</p>
                    <h3>{{ $data->where('OrderStatus', 'To Receive')->count() }}</h3>
                </div>
                <div class="card " onclick="window.location.href='{{ route('CompletedOrderPage') }}'" style="width: 100px; height: 100px; margin-right: 40px;"> 
                    <p>Completed</p>
                    <h3>{{ $data->where('OrderStatus', 'Completed')->count() }}</h3>
                </div>
            
                
            </div>

            <div class="row">
                <div style="width: 100%; margin-top: 50px;">
                 
                    

                    <table class="table">
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
                                    <p>Shipping Address ID</p>
                                </th>
                                
                                <th>
                                    <p>Payment Method</p>
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($data as $item)
                                
                           
                            <tr>
                                <td>
                                    {{ $item->OrderID }}
                                </td>
                                <td>
                                    {{ $item->CustomerID }}
                                </td>
                                <td>
                                    {{ $item->TotalAmount }}
                                </td>
                                <td>
                                    {{ $item->ShippingAddress }}
                                </td>
                                <td>
                                    {{ $item->PaymentMethod }}
                                </td>
                            </tr>


                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
            
            
     

        </div>
    </div>

</div>




















@endsection
