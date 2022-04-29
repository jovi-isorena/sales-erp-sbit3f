<?php

namespace App\Http\Controllers;

use App\Models\ReleaseOrder;
use App\Models\Product;
use App\Models\ReleasedItem;
use App\Models\ReleaseOrderItem;
use App\Models\SerializedProduct;
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
        $orders = ReleaseOrder::with('location')
            ->get();
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
            'productid.*' => 'required|exists:product,productid',
            'quantity.*' => 'required|numeric|min:1|max:25'
        ]);

        $total = array_sum($request->input('quantity'));
        $order = ReleaseOrder::make([
            'TotalItemQuantity' => $total,
            'LocationID' => auth()->user()->employee->Location, 
            'CreatedBy' => auth()->user()->EmployeeID,
            'CreatedDate' => now('Asia/Manila'),
            'Status' => 'Pending'
        ]);

        $result = $order->save();
        if($result){
            foreach ($request->input('productid') as $key => $value) {
                $orderitem = ReleaseOrderItem::make([
                    'ReleaseOrderID' => $order->ReleaseOrderID, 
                    'ProductID' => $value, 
                    'Quantity' => $request->input('quantity')[$key], 
                    'Status' => 'Pending'
                ]);

                $orderitem->save(); 
            }
            $request->session()->flash('success', 'Release Order successfully place.');
        }else{

        }
        return redirect(route('releaseOrderIndex'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReleaseOrder  $releaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ReleaseOrder $releaseorder)
    {
        
        return view('releaseorder.show', [
            'order' => $releaseorder
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

    public function fulfill(ReleaseOrder $releaseorder)
    {
        // $serials = $releaseorder->items->select('I')
        return view('releaseorder.fullfill', [
            'order' => $releaseorder
        ]);
    }

    public function save(Request $request, ReleaseOrder $releaseorder)
    {
        $request->validate([
            'serial.*' => 'required|exists:serializedproduct,SerialNo'
        ]);

        foreach ($request->input('serial') as $key => $value) {
            $id = SerializedProduct::select('ID')
                ->where('SerialNo', $value)
                ->get();
            $releasedItem = ReleasedItem::make([
                'SerializedID' => $id, 
                'SerialNo' => $value, 
                'ReleaseOrderID' => $releaseorder->ReleaseOrderID
            ]);

            $releasedItem->save();
        }

        $releaseorder->update([
            'Status' => 'Fulfilled'
        ]);
        // return redirect(route('releaseOrderIndex'));
    }
}
