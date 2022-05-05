<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->query('status') == 'archived'){
            $products = Product::where('isActive', 0)
                ->get();
        }else{
            $products = Product::where('isActive', 1)
                ->get();
        }
        return view('product.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'Category', 'Specification', 'SellingPrice', 'OnSale', 'Image'
        //
        $request->validate([
            'name' => 'required|max:255|unique:product,name',
            'brand' => 'required|max:255',
            'category' => 'required|max:255',
            'specification' => 'required|max:255',
            'price' => 'required|numeric'
        ]);

        $newProduct = Product::make([
            'Name' => $request->input('name'),
            'Brand' => $request->input('brand'),
            'Category' => $request->input('category'),
            'Specification' => $request->input('specification'),
            'SellingPrice' => $request->input('price'),
            'OnSale' => false,
            'Image' => $request->input('image')
        ]);
        $newProduct->save();
        $request->session()->flash('success', 'Product successfully added!');
        return redirect(route('inventoryMaintenance'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required|max:255',
            'brand'=>'required|max:255',
            'category'=>'required|max:255',
            'specification'=>'required|max:255',
            'price'=>'required|numeric',
            
        ]);

        $product->update([
            'Name'=>$request->input('name'),
            'Brand'=>$request->input('brand'),
            'Category'=>$request->input('category'),
            'Specification'=>$request->input('specification'),
            'SellingPrice'=>$request->input('price'),
            'OnSale'=>$request->input('onsale'),
            'Image'=>$request->input('image')
        ]);
        $request->session()->flash('success','Product Information Successfully Edited');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function archive(Product $product)
    {
        $product->update([
            'isActive' => false
        ]);
        session()->flash('success', 'Product successfully archived!');
        return redirect()->back();
    }
    public function unarchive(Product $product)
    {
        $product->update([
            'isActive' => true
        ]);
        session()->flash('success', 'Product successfully restored!');
        return redirect()->back();
    }
}