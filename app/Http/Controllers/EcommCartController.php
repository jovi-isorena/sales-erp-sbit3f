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

        //dd($request);    
        $customerID = auth()->user()->customer;

        $quantity = $request->input('quantity');
        $id = $request->input('productID');
        $customerIDS = $request->input('customerID');
      
        // $quantity = $request->input('quantity');
        // $id = $request->input('productID');
        // $customerID = $request->input('customerID');
        // $quanArray = [
        //     $qu
        // ];
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

    public function mycartcheckout(Request $request)
    {


        //dd($request);

        $customerID = auth()->user()->customer;

        $customerID2 = auth()->user()->customer->CustomerID;


        $quantity = $request->input('quantity');
        $productID = $request->input('productID');
        $subtotal = $request->input('subtotal');
        // $name = $request->input('name');
        // $brand = $request->input('brand');
        // $category = $request->input('category');
        // $specification = $request->input('specification');   
        // $sellingprice = $request->input('sellingprice'); 

        //  $data = [
        //      'product' => $productID,
        //      'name' => $name,
        //      'brand' => $brand,
        //      'category' => $category,
        //      'specification' => $specification,
        //      'quantity' => $quantity
        //  ];

        // dd($data);

            $totalcost = 0;
            foreach($request->subtotal as $total)
            {
                $totalcost += $total;
            }

            // dd($totalcost);


        $getProduct = Cartitem::all()
        ->where('CustomerID', $customerID2);

        return view('ecomm_customer.mycartcheckout', [
            'customerID' => $customerID,
            'dataproduct' => $getProduct,
            'quantity' => $quantity,
            'subtotal' => $totalcost
            
          
        ]);
    }




    //view cart
    public function mycart()
    {   
        $customerID = auth()->user()->customer->CustomerID;

        $getmyCart = Cartitem::all()
        ->where('CustomerID', $customerID);

        return view('ecomm_customer.mycart', [
            'mycart' => $getmyCart,
            'CustomerID' => $customerID
        ]);
    }

    //add item to cart
    public function cart(Request $request)
    {
        //if the added item is already in the cart, update the quantity only.
        //if the added item is new, insert new record

        //dd($request);


        $customerID = auth()->user()->customer->CustomerID;

        


     
        $idprod = $request->input('productID');
        $customerID = $request->input('customerID');
        $quan = $request->input('quantity');

        $getProduct = Product::where('ProductID', $idprod)
        //  ->where('Password', $hashedpass)
          ->first();

          $quans = Cartitem::where('CustomerID', $customerID)
          ->where('ProductID', $idprod)
          ->first();
          

        //   dd($quans->CartQuantity);

        //    $quan1 = 1;

     //   $customerID = auth()->user()->customer->CustomerID;
        

        // $addtocart = Cartitem::create([
        //     'CustomerID' => $customerID,
        //     'ProductID' => $getProduct->ProductID,
        //     'CartQuantity' => $quan,
        //     'CartPrice' => $getProduct->SellingPrice
        // ]);

            // dd($quans);

            if($quans != null)
            {
                $addtocart = Cartitem::updateOrCreate([
                    'CustomerID' => $customerID,
                    'ProductID' => $getProduct->ProductID,
                   
                    'CartPrice' => $getProduct->SellingPrice
                ],[
                    'CartQuantity' => $quans->CartQuantity+$quan
                ]);
            }

            else
            {
                $addtocart = Cartitem::create([
                    'CustomerID' => $customerID,
                    'ProductID' => $getProduct->ProductID,
                     'CartQuantity' => $quan,
                     'CartPrice' => $getProduct->SellingPrice
                    ]);
            }



       


        // return redirect(route('customerHome'));
        
        return view('ecomm_customer.product', [
            'customerID' => $customerID,
            'product' => $getProduct
        ]);


    }
    
    public function removecart(Request $request)
    {

        // dd($request);

        Cartitem::where('CartID', $request->input('cartID'))->delete();

        return redirect(route('mycartview'));
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
