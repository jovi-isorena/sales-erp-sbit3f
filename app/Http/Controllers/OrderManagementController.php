<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ordereditem;

use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function toPay()
    {
        $getOrdersPending = Order::all()
        ->where('OrderStatus', '=', 'Pending');


        return view('nonadmin.toPay', [
            'pending' => $getOrdersPending
       
        ]);
    } 

    public function toShip()
    {

        
        $getOrdersToShip = Order::all()
        ->where('OrderStatus', '=', 'To Ship');

        return view('nonadmin.toShip', [
            'toship' => $getOrdersToShip
        ]);
    } 

    public function toDeliver()
    {



        $getOrdersToDeliver = Order::all()
        ->where('OrderStatus', '=', 'To Deliver');

        return view('nonadmin.toDeliver', [
            'todeliver' => $getOrdersToDeliver
        ]);
    } 

    public function CompletedOrder()
    {
        $getOrdersCompleted = Order::all()
        ->where('OrderStatus', '=', 'Completed');

        return view('nonadmin.CompletedOrder' , [
            'completed' => $getOrdersCompleted
        ]);
    } 
}
