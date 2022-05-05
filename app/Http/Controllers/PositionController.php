<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return view('position.index', [
            'positions' => $positions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'positionname' => 'required'
        ]);

        $position = Position::make([
            'PositionName' => $request->input('positionname'), 
            'AddItem' => $request->input('additem') == 'on' ? true : false, 
            'ItemListDetail' => $request->input('itemlistdetail') == 'on' ? true : false, 
            'ModifyArchiveItem' => $request->input('itemmodifyarchive') == 'on' ? true : false, 
            'CreatePurchaseOrder' => $request->input('createpurchase') == 'on' ? true : false, 
            'PurchaseOrderListDetail' => $request->input('purchaselistdetail') == 'on' ? true : false, 
            'PurchaseOrderApprove' => $request->input('approvepurchase') == 'on' ? true : false, 
            'PurchaseOrderReceive' => $request->input('receivepurchase') == 'on' ? true : false, 
            'InitiateQualityControl' => $request->input('initiatetest') == 'on' ? true : false, 
            'QualityControlListDetail' => $request->input('viewtestlist') == 'on' ? true : false, 
            'CreateRestockRequest' => $request->input('createrequest') == 'on' ? true : false, 
            'CancelRestockRequest' => $request->input('cancelrequest') == 'on' ? true : false, 
            'RestockRequestListDetail' => $request->input('requestlistdetail') == 'on' ? true : false, 
            'RestockApproveDeny' => $request->input('approvedenyrequest') == 'on' ? true : false,
            'isActive' => true
        ]);

        $result = $position->save();

        if($result){
            $request->session()->flash('success', 'Position successfully saved.');
        }else{
            $request->session()->flash('success', 'Position failed to save.');
        }

        return redirect(route('positionIndex'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return view('position.show', [
            'position' => $position
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, position $position)
    {
        // dd($request->input('positionname'));
        $result = $position->update([
            'PositionName' => $request->input('positionname'), 
            'AddItem' => $request->input('additem') == 'on' ? true : false, 
            'ItemListDetail' => $request->input('itemlistdetail') == 'on' ? true : false, 
            'ModifyArchiveItem' => $request->input('itemmodifyarchive') == 'on' ? true : false, 
            'CreatePurchaseOrder' => $request->input('createpurchase') == 'on' ? true : false, 
            'PurchaseOrderListDetail' => $request->input('purchaselistdetail') == 'on' ? true : false, 
            'PurchaseOrderApprove' => $request->input('approvepurchase') == 'on' ? true : false, 
            'PurchaseOrderReceive' => $request->input('receivepurchase') == 'on' ? true : false, 
            'InitiateQualityControl' => $request->input('initiatetest') == 'on' ? true : false, 
            'QualityControlListDetail' => $request->input('viewtestlist') == 'on' ? true : false, 
            'CreateRestockRequest' => $request->input('createrequest') == 'on' ? true : false, 
            'CancelRestockRequest' => $request->input('cancelrequest') == 'on' ? true : false, 
            'RestockRequestListDetail' => $request->input('requestlistdetail') == 'on' ? true : false, 
            'RestockApproveDeny' => $request->input('approvedenyrequest') == 'on' ? true : false
        ]);
        if($result){
            $request->session()->flash('success', 'Role and Access updated successfully.');
        }else{
            $request->session()->flash('error', 'Role and Access failed to updated.');
        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(position $position)
    {
        //
    }

    public function archive(Position $position)
    {
        $position->update([
            'isActive' => false
        ]);
        session()->flash('success', 'Position successfully archived!');
        return redirect()->back();
    }
    public function unarchive(Position $position)
    {
        $position->update([
            'isActive' => true
        ]);
        session()->flash('success', 'Position successfully restored!');
        return redirect()->back();
    }
}
