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
        // dd($request);

     

        $day = date("d")+3;
        $currentdate = date("Y-m-d");
        $dateforR = date("Y-m-").$day;
        $status = "Pending";

       

        // dd($valid);

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


        return redirect(route('myordersview'));
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


        return redirect(route('myordersview'));
    }


      //for cod
      public function placeorder3(Request $request)
      {
        //  dd($request);

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
  
  
          return redirect(route('myordersview'));
      }



       //for codcart
       public function placeorder3cart(Request $request)
       {
        //   dd($request);

        $customerID = auth()->user()->customer->CustomerID;

 
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


      
           

           for($i = 0; $i < count($request->productID); $i++)
           {
            $inputOrderItems[] = [

                'OrderID' => $request->orderIDs[$i],
                'ProductID' => $request->productID[$i],
                'Quantity' => $request->quantity[$i],
    
               ];
           }


           Ordereditem::insert($inputOrderItems);

           Cartitem::where('CustomerID', $customerID)->delete();

   
        //    $inputOrderItems = Ordereditem::create([
   
        //        'OrderID' => $request->input('orderID'),
        //        'ProductID' => $request->input('productID'),
        //        'Quantity' => $request->input('quantity'),
              
                    
        //    ]);



   
   
           return redirect(route('myordersview'));
       }

       //epayment
       public function placeordercart(Request $request)
       {
        //  dd($request);
 
        $customerID = auth()->user()->customer->CustomerID;

           $day = date("d")+3;
           $currentdate = date("Y-m-d");
           $dateforR = date("Y-m-").$day;
           $status = "Pending";


        //    $validate = $request->validate([
        //        'referenceno' => 'required|max:11|min:11'
        //    ]);

   
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


      
           

           for($i = 0; $i < count($request->productID); $i++)
           {
            $inputOrderItems[] = [

                'OrderID' => $request->orderIDs[$i],
                'ProductID' => $request->productID[$i],
                'Quantity' => $request->quantity[$i],
    
               ];
           }


           Ordereditem::insert($inputOrderItems);

           Cartitem::where('CustomerID', $customerID)->delete();


   
        //    $inputOrderItems = Ordereditem::create([
   
        //        'OrderID' => $request->input('orderID'),
        //        'ProductID' => $request->input('productID'),
        //        'Quantity' => $request->input('quantity'),
              
                    
        //    ]);



   
   
           return redirect(route('myordersview'));
       }

       //credit
       public function placeorder2cart(Request $request)
       {
        //    dd($request);
 
        $customerID = auth()->user()->customer->CustomerID;

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


      
           

           for($i = 0; $i < count($request->productID); $i++)
           {
            $inputOrderItems[] = [

                'OrderID' => $request->orderIDs[$i],
                'ProductID' => $request->productID[$i],
                'Quantity' => $request->quantity[$i],
    
               ];
           }


           Ordereditem::insert($inputOrderItems);           
           Cartitem::where('CustomerID', $customerID)->delete();

   
        //    $inputOrderItems = Ordereditem::create([
   
        //        'OrderID' => $request->input('orderID'),
        //        'ProductID' => $request->input('productID'),
        //        'Quantity' => $request->input('quantity'),
              
                    
        //    ]);



           return redirect(route('myordersview'));
       }
   
   
   
   
   
  
  
    //Buynow
    public function prepplaceorder(Request $request)
    {
       // dd($request);
        $id = rand(10000, 99999);
        $order = "Order";

        // $valid = $request->validate([
        //     'paymentmethod' => 'required',
        //     'deliveryamount' => 'required'
        // ]);

        $customerID2 = auth()->user()->customer;

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


        $getProduct = Product::where('ProductID', $productID)
        ->first();


        if($paymentMethod == "COD")
        {
            return view('ecomm_customer.cod', [
                'orderID' => $orderID,
                'paymentmethod' => $paymentMethod,
                'customerID' => $customerID2,
                'address' => $address,
                'quantity' => $quantity,
                'product' => $getProduct,
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
                'customerID' => $customerID2,
                'address' => $address,
                'quantity' => $quantity,
                'product' => $getProduct,
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
                'customerID' => $customerID2,
                'address' => $address,
                'quantity' => $quantity,
                'product' => $getProduct,
                'delivery' => $delivery,
                'deliveryammount' => $deliveryamount,
                'totalproduct' => $totalproduct
            ]);
        }
    }


    //Checkout Cart
    public function prepplaceorderCart(Request $request)
    {
        // dd($request);

        $customerID2 = auth()->user()->customer;
        $customerID3 = auth()->user()->customer->CustomerID;
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

        $getProduct = Cartitem::all()
        ->where('CustomerID', $customerID3);

        // $getProduct = Product::where('ProductID', $productID)
        // ->first();


        if($paymentMethod == "COD")
        {
            return view('ecomm_customer.codcart', [
                'orderID' => $orderID,
                'paymentmethod' => $paymentMethod,
                'customerID' => $customerID2,
                'address' => $address,

                'productdata' => $getProduct,
                
                'quantity' => $quantity,
                'productID' => $productID,
                'delivery' => $delivery,
                'deliveryammount' => $deliveryamount,
                'totalproduct' => $totalproduct
            ]);
        }

        if($paymentMethod == "E-Payment")
        {
            
            return view('ecomm_customer.epaymentcart', [
                'orderID' => $orderID,
                'paymentmethod' => $paymentMethod,
                'customerID' => $customerID2,
                'address' => $address,

                'productdata' => $getProduct,
                
                'quantity' => $quantity,
                'productID' => $productID,
                'delivery' => $delivery,
                'deliveryammount' => $deliveryamount,
                'totalproduct' => $totalproduct
            ]);
        }

        if($paymentMethod == "Credit")
        {
            return view('ecomm_customer.creditcart', [
                'orderID' => $orderID,
                'paymentmethod' => $paymentMethod,
                'customerID' => $customerID2,
                'address' => $address,

                'productdata' => $getProduct,
                
                'quantity' => $quantity,
                'productID' => $productID,
                'delivery' => $delivery,
                'deliveryammount' => $deliveryamount,
                'totalproduct' => $totalproduct
            ]);
        }
    }



    //buy
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

    //cart
    
    public function codcart()
    {
        return view('ecomm_customer.codcart');
    }

    public function epaymentcart()
    {
        return view('ecomm_customer.epaymentcart');
    }
    public function creditcart()
    {
        return view('ecomm_customer.creditcart');
    }


}
