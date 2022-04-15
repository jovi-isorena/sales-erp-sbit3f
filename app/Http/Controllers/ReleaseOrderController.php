<?php

namespace App\Http\Controllers;

use App\Models\ReleaseOrder;
use App\Models\Product;
use Illuminate\Http\Request;

class ReleaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = ReleaseOrder::all();
        return view('releaseorder.index',[
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('isActive', true)->get();
        return view('releaseorder.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // protected $fillable = ['ProductID', 'Quantity', 'CreatedBy', 'CreatedDate', 'ApprovedBy', 'ApprovedDate', 'Status'];
        $request->validate([
            'productid' => 'required|exists:product,productid',
            'quantity' => 'required|numeric|min:1|max:25'
        ]);

        $order = ReleaseOrder::make([
            'ProductID' => $request->input('productid'),
            'Quantity' => $request->input('quantity'),
            'CreatedBy' => auth()->user()->EmployeeID,
            'CreatedDate' => now('Asia/Manila'),
            'Status' => 'Pending'
        ]);

        $order->save();
        $request->session()->flash('success', 'Release Order successfully place.');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReleaseOrder  $releaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ReleaseOrder $releaseOrder)
    {
        dd($releaseOrder);
        return view('releaseorder.show', [
            'order' => $releaseOrder
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReleaseOrder  $releaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ReleaseOrder $releaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReleaseOrder  $releaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReleaseOrder $releaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReleaseOrder  $releaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReleaseOrder $releaseOrder)
    {
        //
    }
}
