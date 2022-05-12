<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Ordereditem;

use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    


    
   
   //To pay Start
    public function toPay()
    {
        $getOrdersPending = Order::all()
        ->where('OrderStatus', '=', 'Pending');


        return view('nonadmin.toPay', [
            'pending' => $getOrdersPending
       
        ]);
    } 

    public function toPayView(Request $request)
    {
       // dd($request);
        $orderID = $request->input('orderID');
        
        $getviewToPayitemns = Order::where('OrderID', $orderID)
        ->first();

        // $productID = $getviewToPayitemns->ordereditems->first()->ProductID;


        $getviewToPayOrderedItems = Ordereditem::all()
        ->where('OrderID', $orderID);

        // foreach($getviewToPayOrderedItems as $data)
        // {
        //     $getproduct = Product::all()
        //     ->where('ProductID', 'like' , "%$data->ProductID%" );
        // }

      
        // $getproduct = Product::all()
        // ->where('ProductID', $getviewToPayOrderedItems->ProductID);
       

           // 'product' => $getproduct

        return view('nonadmin.toPayView', [
            'order' => $getviewToPayitemns,
            'orderditems' => $getviewToPayOrderedItems
        ]);
    }


    public function toBeShipped(Request $request)
    {
        $orderID = $request->input('orderID');
        $updateStatus = "To Ship";

        
        // $getviewToPayOrderedItems = Ordereditem::where('OrderID', $orderID)
        // ->get();

        

        $updateStatus = Order::where('OrderID', $orderID)
        ->update([
            'OrderStatus' => $updateStatus
        ]);
        

        return redirect(route('toShipPage'));
    }


     //To pay End


     //To Ship start

    public function toShip()
    {

        
        $getOrdersToShip = Order::all()
        ->where('OrderStatus', '=', 'To Ship');

        return view('nonadmin.toShip', [
            'toship' => $getOrdersToShip
        ]);
    } 

    public function toShipView(Request $request)
    {
        $orderID = $request->input('orderID');

        $getviewToShipitems = Order::where('OrderID', $orderID)
        ->first();


        $getviewToShipOrderedItems = Ordereditem::all()
        ->where('OrderID', $orderID);
        
        // $getviewToShipitems = Order::where('OrderID', $orderID)
        // ->first();

        // $productID = $getviewToShipitems->ordereditems->first()->ProductID;

        // $getproduct = Product::where('ProductID', $productID)
        // ->first();

        return view('nonadmin.toShipView', [
            'order' => $getviewToShipitems,
            'orderditems' => $getviewToShipOrderedItems
        ]);
    }

    public function toBeReceived(Request $request)
    {
        $orderID = $request->input('orderID');
        $updateStatus = "To Receive";

        $updateStatus = Order::where('OrderID', $orderID)
        ->update([
            'OrderStatus' => $updateStatus
        ]);
        

        return redirect(route('toDeliverPage'));
    }


    //To Ship end


    public function toDeliver()
    {



        $getOrdersToDeliver = Order::all()
        ->where('OrderStatus', '=', 'To Receive');

        return view('nonadmin.toDeliver', [
            'todeliver' => $getOrdersToDeliver
        ]);
    } 

    public function toReceiveView(Request $request)
    {
        $orderID = $request->input('orderID');
        
        $getviewToReceiveitems = Order::where('OrderID', $orderID)
        ->first();

        $getviewToReceiveOrderedItems = Ordereditem::all()
        ->where('OrderID', $orderID);

        return view('nonadmin.toReceiveView', [
            'order' => $getviewToReceiveitems,
            'orderditems' => $getviewToReceiveOrderedItems
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
