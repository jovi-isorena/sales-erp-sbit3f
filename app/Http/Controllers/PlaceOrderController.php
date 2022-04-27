<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Cartitem;
use App\Models\Product;
use App\Models\Customeraddress;
use App\Models\Order;
use App\Models\Ordereditem;
use Illuminate\Http\Request;

class PlaceOrderController extends Controller
{
    //for e-comm
    public function placeorder(Request $request)
    {
        //dd($request);
        $day = date("d")+3;
        $currentdate = date("Y-m-d");
        $dateforR = date("Y-m-").$day;
        $status = "Pending";

        $delivery = $request->input('delivery');

        if($delivery == "Delivery1")
        {
            $deliveryReceive = $dateforR;
        }

        if($delivery == "Delivery2")
        {
            $deliveryReceive = $currentdate;
        }

        $inputOrder = Order::create([

            'OrderID' => $request->input('orderID'),
            'CustomerID' => $request->input('customerID'),
            'TotalAmount' => $request->input('totalamount'),
            'ShippingAddress' => $request->input('shippingaddress'),
            'PaymentMethod' => $request->input('paymentmethod'),
            'ReceivedDate' => $deliveryReceive,
            'OrderStatus' => $status
                 
        ]);

        $inputOrderItems = Ordereditem::create([

            'OrderID' => $request->input('orderID'),
            'ProductID' => $request->input('productID'),
            'Quantity' => $request->input('quantity'),
           
                 
        ]);


        return redirect(route('ecommprofile'));
    }


        //for credit
    public function placeorder2(Request $request)
    {
       // dd($request);
        $day = date("d")+3;
        $currentdate = date("Y-m-d");
        $dateforR = date("Y-m-").$day;
        $status = "Pending";

        $delivery = $request->input('delivery');

        if($delivery == "Delivery1")
        {
            $deliveryReceive = $dateforR;
        }

        if($delivery == "Delivery2")
        {
            $deliveryReceive = $currentdate;
        }

        $inputOrder = Order::create([

            'OrderID' => $request->input('orderID'),
            'CustomerID' => $request->input('customerID'),
            'TotalAmount' => $request->input('totalamount'),
            'ShippingAddress' => $request->input('shippingaddress'),
            'PaymentMethod' => $request->input('paymentmethod'),
            'ReceivedDate' => $deliveryReceive,
            'OrderStatus' => $status
                 
        ]);

        $inputOrderItems = Ordereditem::create([

            'OrderID' => $request->input('orderID'),
            'ProductID' => $request->input('productID'),
            'Quantity' => $request->input('quantity'),
           
                 
        ]);


        return redirect(route('ecommprofile'));
    }


      //for cod
      public function placeorder3(Request $request)
      {
            //dd($request);
          $day = date("d")+3;
          $currentdate = date("Y-m-d");
          $dateforR = date("Y-m-").$day;
          $status = "Pending";
  
          $delivery = $request->input('delivery');
  
          if($delivery == "Delivery1")
          {
              $deliveryReceive = $dateforR;
          }
  
          if($delivery == "Delivery2")
          {
              $deliveryReceive = $currentdate;
          }
  
          $inputOrder = Order::create([
  
              'OrderID' => $request->input('orderID'),
              'CustomerID' => $request->input('customerID'),
              'TotalAmount' => $request->input('totalamount'),
              'ShippingAddress' => $request->input('shippingaddress'),
              'PaymentMethod' => $request->input('paymentmethod'),
              'ReceivedDate' => $deliveryReceive,
              'OrderStatus' => $status
                   
          ]);
  
          $inputOrderItems = Ordereditem::create([
  
              'OrderID' => $request->input('orderID'),
              'ProductID' => $request->input('productID'),
              'Quantity' => $request->input('quantity'),
             
                   
          ]);
  
  
          return redirect(route('ecommprofile'));
      }
  
  


    public function prepplaceorder(Request $request)
    {
       // dd($request);
        $id = rand(10000, 99999);
        $order = "Order";


        //OrderID
        $orderID = $order.$id;
        $paymentMethod = $request->input('paymentmethod');
        $customerID = $request->input('customerID');
        $address = $request->input('address');
        $quantity = $request->input('quantity');
        $productID = $request->input('productID');
        $delivery = $request->input('delivery');
        $deliveryamount = $request->input('deliveryamount');
        $totalproduct = $request->input('totalproduct');


        if($paymentMethod == "COD")
        {
            return view('ecomm_customer.cod', [
                'orderID' => $orderID,
                'paymentmethod' => $paymentMethod,
                'customerID' => $customerID,
                'address' => $address,
                'quantity' => $quantity,
                'productID' => $productID,
                'delivery' => $delivery,
                'deliveryammount' => $deliveryamount,
                'totalproduct' => $totalproduct
            ]);
        }

        if($paymentMethod == "E-Payment")
        {
            return view('ecomm_customer.epayment', [
                'orderID' => $orderID,
                'paymentmethod' => $paymentMethod,
                'customerID' => $customerID,
                'address' => $address,
                'quantity' => $quantity,
                'productID' => $productID,
                'delivery' => $delivery,
                'deliveryammount' => $deliveryamount,
                'totalproduct' => $totalproduct
            ]);
        }

        if($paymentMethod == "Credit")
        {
            return view('ecomm_customer.credit', [
                'orderID' => $orderID,
                'paymentmethod' => $paymentMethod,
                'customerID' => $customerID,
                'address' => $address,
                'quantity' => $quantity,
                'productID' => $productID,
                'delivery' => $delivery,
                'deliveryammount' => $deliveryamount,
                'totalproduct' => $totalproduct
            ]);
        }


   
    }

    public function cod()
    {
        return view('ecomm_customer.cod');
    }

    public function epayment()
    {
        return view('ecomm_customer.epayment');
    }
    public function credit()
    {
        return view('ecomm_customer.credit');
    }
}
