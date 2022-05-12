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
        
        $get = Order::where('CustomerID', $customerID)
        ->get();
        

        return view('ecomm_customer.myorders', [
            'myorder' => $get
           
        ]);
    }

    //To received an Item

    public function myordersReceive(Request $request)
    {
    

        $updateStatusR = "Completed";

        $orderID = $request->input('orderID');

        $updateStatus = Order::where('OrderID', $orderID)
        ->update([
            'OrderStatus' => $updateStatusR
        ]);

        return redirect(route('myordersview'));
    }

    

    //For My Orders

    public function pendingorders()
    {
        $customerID = auth()->user()->customer->CustomerID;
        
        $getOrdersPending = Order::all()
        ->where('CustomerID', $customerID)
        ->where('OrderStatus', '=', 'Pending');

        return view('ecomm_customer.pendingorders', [
            'myorderPending' => $getOrdersPending
        ]);
    }

    public function shippedorders()
    {
        $customerID = auth()->user()->customer->CustomerID;

        $getOrdersToShip = Order::all()
        ->where('CustomerID', $customerID)
        ->where('OrderStatus', '=', 'To Ship');

        return view('ecomm_customer.shippedorders', [
            'myorderToShip' => $getOrdersToShip
        ]);
    }

    public function receivedorders()
    {
        $customerID = auth()->user()->customer->CustomerID;

        $getOrdersToReceive = Order::all()
        ->where('CustomerID', $customerID)
        ->where('OrderStatus', '=', 'To Receive');

        return view('ecomm_customer.receivedorders', [
            'myorderToReceive' => $getOrdersToReceive
        ]);
    }

    public function completedorders()
    {
        $customerID = auth()->user()->customer->CustomerID;

        $getOrdersCompleted = Order::all()
        ->where('CustomerID', $customerID)
        ->where('OrderStatus', '=', 'Completed');

        return view('ecomm_customer.completedorders', [
            'myorderCompleted' => $getOrdersCompleted
        ]);
    }



}
