<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customeraddress;
use App\Models\Product;
use App\Models\Order;
use App\Models\Ordereditem;
use App\Models\Cartitem;
use Illuminate\Support\Facades\DB; //nadagdag

class ecommController extends Controller
{

  

   

    public function index()
    {


        $getProduct = Product::where('isActive', '=', '1')
        ->get();

        $id =  auth()->user()->customer->CustomerID;

       // dd($getProduct);

        // return view('ecomm_customer.index')->with('getProduct', $getProduct);
        return view('ecomm_customer.index', [
            'customerID' => $id,
            'getProduct' => $getProduct
        ]);

    }


    public function profile()
    {

        // $customerID = auth()->user()->customer->CustomerID;
        $customer = auth()->user()->customer;
        // dd($customer->customeraddresses);

        // $getaddressID = $customer->customeraddresses[0]];

        // $getorder = Order::select(DB::raw('count(OrderID) AS orders'))
        // ->where('CustomerID', $customerID)
        // ->get();
        // $getorder = DB::table('order')
        // ->where('CustomerID', $customerID);
      



        return view('ecomm_customer.profile', [
            'customer' => $customer,
              //'num' => $getorder
        ]);


    }
    
  
    


    public function register()
    {
        return view('ecomm_customer.register');
    }


}
