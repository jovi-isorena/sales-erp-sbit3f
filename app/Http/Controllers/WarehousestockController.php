<?php

namespace App\Http\Controllers;

use App\Models\Warehousestock;
use Illuminate\Http\Request;

class WarehousestockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('level')){
            if($request->query('level') === 'critical'){
                $stocks = Warehousestock::whereRaw('AvailableStock <= CriticalLevel')
                    ->get();
            }elseif($request->query('level') === 'low'){
                $stocks = Warehousestock::whereRaw('AvailableStock <= RestockLevel')
                    ->whereRaw('AvailableStock > CriticalLevel')
                    ->get();
            }
        }else{
            $stocks = Warehousestock::all();
        }

        return view('warehousestock.index', [
            'stocks' => $stocks
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehousestock  $warehousestock
     * @return \Illuminate\Http\Response
     */
    public function show(Warehousestock $warehousestock)
    {
        return view('warehousestock.show', [
            'stock' => $warehousestock
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehousestock  $warehousestock
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehousestock $warehousestock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehousestock  $warehousestock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehousestock $warehousestock)
    {
        $request->validate([
            'restock' => 'required|numeric|min:0|max:99999999999',
            'critical' => 'required|numeric|min:0|max:99999999999',
            'buffer' => 'required|numeric|min:0|max:99999999999',
            'capacity' => 'required|numeric|min:0|max:99999999999'
        ]);

        $result = $warehousestock->update([
            'RestockLevel' => $request->input('restock'), 
            'CriticalLevel' => $request->input('critical'), 
            'BufferLimit' => $request->input('buffer'), 
            'Capacity' => $request->input('capacity')
        ]);

        if($result){
            $request->session()->flash('success', 'Stock updated successfully.');
        }else{
            $request->session()->flash('error', 'Stock failed to update.');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehousestock  $warehousestock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehousestock $warehousestock)
    {
        //
    }
}
