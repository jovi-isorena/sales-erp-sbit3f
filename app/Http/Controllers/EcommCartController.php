<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Cartitem;
use App\Models\Product;
use App\Models\Customeraddress;

use Illuminate\Support\Facades\DB; //nadagdag

class EcommCartController extends Controller
{


    public function buynow(Request $request)
    {

       // dd($request);
        $quantity = $request->input('quantity');
        $id = $request->input('productID');
        $customerID = $request->input('customerID');


        //dd($request);

        //Get product
        $getProduct = Product::where('ProductID', $id)
        ->first();

        //Get address
        $getaddressID = Customeraddress::where('CustomerID', $customerID)
        ->first();


        return view('ecomm_customer.buynow', [
            'customerID' => $customerID,
            'address' => $getaddressID,
            'product' => $getProduct,
            'quantity' => $quantity
        ]);
    }

    //add item to cart
    public function cart(Request $request)
    {
        //if the added item is already in the cart, update the quantity only.
        //if the added item is new, insert new record

        //dd($request);

        $idprod = $request->input('productID');
        $customerID = $request->input('customerID');

        $getProduct = Product::where('ProductID', $idprod)
        //  ->where('Password', $hashedpass)
          ->first();

        $quan = 0;

     //   $customerID = auth()->user()->customer->CustomerID;
        

        $addtocart = Cartitem::create([
            'CustomerID' => $customerID,
            'ProductID' => $getProduct->ProductID,
            'CartQuantity' => $quan,
            'CartPrice' => $getProduct->SellingPrice
        ]);

        // return redirect(route('customerHome'));
        
        return view('ecomm_customer.product', [
            'customerID' => $customerID,
            'product' => $getProduct
        ]);


    }


    public function product(Request $request)
    {
        $Cid =  auth()->user()->customer->CustomerID;

       // $Cid =  auth()->user()->customer->CustomerID;

        $id = $request->input('productID');
        //dd($request);

        $getProduct = Product::where('ProductID', $id)
        //  ->where('Password', $hashedpass)
        ->first();


        return view('ecomm_customer.product', [
            'customerID' => $Cid,
            'product' => $getProduct
        ]);


        // return view('ecomm_customer.product')->with('product', $getProduct);

    }

}
