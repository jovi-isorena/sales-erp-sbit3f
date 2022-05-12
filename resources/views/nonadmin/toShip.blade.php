@extends('layouts.ordermanager')

@section('content')


<div style="height: 100vh; width: 100%;">

    <div class="row">
        <div class="col-sm-5 col-md-2">
            
            <div class="side">

                <label for=""> <a  href="{{ route('toPayPage') }}"> To Pay </a></label>
                <br>
                <label for=""> <a style="color:red;" href="{{ route('toShipPage') }}"> To Ship </a></label>
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

                                <th>
                                    <p>Action</p>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($toship as $toships )
                            <tr>
                                <td>
                                    <p>{{ $toships->OrderID }}</p>
                                </td>
                                <td>
                                    <p>{{ $toships->CustomerID }}</p>
                                </td>
                                <td>
                                    <p>{{ $toships->TotalAmount  }}</p>
                                </td>
                                <td>
                                    <p>{{ $toships->ShippingAddress }}</p>
                                </td>
                                <td>
                                    <p>{{ $toships->PaymentMethod  }}</p>
                                </td>
                                <td>

                                    <form action="{{ route('toShipViews') }}" method="post">

                                        @csrf

                                        <input type="hidden" name="orderID" value="{{ $toships->OrderID }}">

                                        <button class="btn btn-primary">View</button>
                                    </form>

                                 
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
