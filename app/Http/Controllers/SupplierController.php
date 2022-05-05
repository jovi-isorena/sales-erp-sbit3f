<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\SupplierProduct;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index', [
            'suppliers' => $suppliers
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
        return view('supplier.create',[
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
        // dd($request);
        $request->validate([
            'companyname' => 'required|max:255|distinct',
            'contactnumber' => 'required|max:20',
            'address' => 'required|max:255'
        ]);

        $supplier = Supplier::make([
            'CompanyName' => $request->input('companyname'), 
            'ContactNumber' => $request->input('contactnumber'), 
            'Address' => $request->input('address'), 
            'isActive' => true
        ]);

        $result = $supplier->save();

        if($result){
            foreach($request->input('product') as $product){
                $suppProd = SupplierProduct::make([
                    'SupplierID' => $supplier->SupplierID, 
                    'ProductID' => $product
                ]);
                $suppProd->save();
            }
            $request->session()->flash('success', 'Supplier successfully added.');
        }else{
            $request->session()->flash('error', 'Supplier failed to add.');
        }

        return redirect(route('supplierIndex'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('supplier.show', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $products = Product::where('isActive', 1)->get();
        return view('supplier.edit', [
            'supplier' => $supplier,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        // dd($request);
        $request->validate([
            'companyname' => 'required|max:255|distinct',
            'contactnumber' => 'required|max:20',
            'address' => 'required|max:255'
        ]);

        $result = $supplier->update([
            'CompanyName' => $request->input('companyname'), 
            'ContactNumber' => $request->input('contactnumber'), 
            'Address' => $request->input('address'), 
            'isActive' => true
        ]);


        if($result){
            SupplierProduct::where('SupplierID', $supplier->SupplierID)->delete();
            if($request->has('product')){
                foreach($request->input('product') as $product){
                    $suppProd = SupplierProduct::make([
                        'SupplierID' => $supplier->SupplierID, 
                        'ProductID' => $product
                    ]);
                    $suppProd->save();
                }
            }
            $request->session()->flash('success', 'Supplier successfully updated.');
        }else{
            $request->session()->flash('error', 'Supplier failed to update.');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
