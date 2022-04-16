<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Clockwork\Storage\Search;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = [];
        if($request->has('search')){
            
            $orders = PurchaseOrder::where('ID', 'LIKE', '%'.$request->query('search').'%')
                ->where('Status', 'submitted')
                ->with('createdby')
                ->get();
        }
        return view('purchaseorder.index', [
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
        $products = Product::where('isActive', 1)->get();
        return view('purchaseorder.create', [
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
        //make purchase order
        $pOrder = PurchaseOrder::make([
            'CreatedBy' => auth()->user()->EmployeeID,
            'CreatedDate' => now('Asia/Manila'),
            'Status' => 'submitted'

        ]);

        $result = $pOrder->save();
        if($result){
            foreach ($request->input('productid') as $key => $value) {
                $quantity = $request->input('quantity')[$key];
                $purchaseOrderItem = PurchaseOrderItem::make([
                    'PurchaseOrderID' => $pOrder->ID, 
                    'ProductID' => $value, 
                    'Quantity' => $quantity
                ]);
                $purchaseOrderItem->save();
            }
        }else{
            $request->session()->flash('error', 'Purchase Order Created');
            return redirect(route('purchaseOrderIndex'));    
        }

        $request->session()->flash('success', 'Purchase Order Created');
        return redirect(route('purchaseOrderIndex'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        
    }

    public function receive(PurchaseOrder $purchaseorder){
        return view('purchaseorder.receive', [
            'purchaseOrder' => $purchaseorder,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseorder)
    {
        $request->validate([
            'recquantity.*' => 'required|min:0',
            'deliveryman' => 'required'

        ]);
        $orderStatus = 'received complete';
        foreach ($request->input('orderitemid') as $key => $orderItem) {
            $item = PurchaseOrderItem::find($orderItem);
            $quantity = $request->input('recquantity')[$key];
            if($quantity == $item->Quantity){
                $status = 'received complete';
            }elseif($quantity == 0){
                $status = 'not received';
                $orderStatus = 'received complete';
            }elseif($quantity > $item->Quantity){
                $status = 'received over';
            }elseif($quantity < $item->Quantity){
                $status = 'received incomplete';
                $orderStatus = 'received incomplete';
            }
            $item->update([
                'ReceivedQuantity' => $quantity,
                'Status' => $status
            ]);
        }

        $purchaseorder->update([
            'DeliveredBy' => $request->input('deliveryman'),
            'ReceivedBy' => auth()->user()->EmployeeID,
            'ReceivedDate' => now('Asia/Manila'),
            'Status' => $orderStatus

        ]);

        session()->flash('success', 'Purchase Order Received');
        return redirect(route('purchaseOrderIndex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
