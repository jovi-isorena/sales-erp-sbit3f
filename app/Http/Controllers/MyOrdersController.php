<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customeraddress;
use App\Models\Product;
use App\Models\Order;
use App\Models\Ordereditem;
use App\Models\Cartitem;
use Illuminate\Support\Facades\DB; //nadagdag


class MyOrdersController extends Controller
{
    public function myorders()
    {

        
        $customerID = auth()->user()->customer->CustomerID;
        
        $getOrdersPending = Order::all()
        ->where('CustomerID', $customerID)
        ->where('OrderStatus', '=', 'Pending');

             
        $getOrdersToShip = Order::all()
        ->where('CustomerID', $customerID)
        ->where('OrderStatus', '=', 'To Ship');

        $getOrdersToReceive = Order::all()
        ->where('CustomerID', $customerID)
        ->where('OrderStatus', '=', 'To Receive');





        return view('ecomm_customer.myorders', [
            'myorderPending' => $getOrdersPending,
            'myorderToShip' => $getOrdersToShip,
            'myorderToReceive' => $getOrdersToReceive
        ]);
    }
}
