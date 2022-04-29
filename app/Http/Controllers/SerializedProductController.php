<?php

namespace App\Http\Controllers;

use App\Models\Serializedproduct;
use App\Models\Product;
use App\Models\QualityControlTestItem;
use Illuminate\Http\Request;

class SerializedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serials = Serializedproduct::all();
        return view('serializedproduct.index', [
            'serials' => $serials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('isActive', 1)
            ->get();
        return view('serializedproduct.create',[
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
        // dd($request->input());
        // $request->validate([
        //     'serial' => 'required'
        // ]);
        if(empty($request->input('serial'))){
            return redirect()->back();
        }
        $inputLength = sizeof($request->input('serial'));

        for ($i=0; $i < $inputLength; $i++) { 
            $now = now('Asia/Manila');
            $serialized = SerializedProduct::make([
                'SerialNo' => $request->input('serial')[$i],
                'ManufacturerSerialNo' => $this->generateSerialNo(),
                'ProductID' => $request->input('product'),
                'AddedOn' => $now,
                'ModifiedOn' => $now,
                'AddedBy' => auth()->user()->EmployeeID,
                'ModifiedBy' => auth()->user()->EmployeeID,
                'Location' => $request->input('location')[$i],
                'Status' => $request->input('status')[$i]
            ]);
            $serialized->save();
        }
        session()->flash('success', 'Serial Nos sucessfully stored.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\serializedproduct  $serializedproduct
     * @return \Illuminate\Http\Response
     */
    public function show(serializedproduct $serializedproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\serializedproduct  $serializedproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(serializedproduct $serializedproduct)
    {
        return view('serializedproduct.edit', [
            'serialized' => $serializedproduct
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\serializedproduct  $serializedproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, serializedproduct $serializedproduct)
    {
        $request->validate([
            'location' => 'required',
            'status' => 'required'
        ]);
        // dd($serializedproduct);
        $serializedproduct->update([
            'Location' => $request->input('location'),
            'Status' => $request->input('status'),
            'ModifiedOn' => now('Asia/Manila'),
            'ModifiedBy' => auth()->user()->EmployeeID

        ]);
        $request->session()->flash('success', 'Product successfully updated.');
        return redirect()->back();
    }

    //get
    public function checkin(Request $request){
        if(!empty($request->query('search'))){
            $products = QualityControlTestItem::where('CheckedIn', 'Perfect Condition')
                ->where('CheckedIn', false)
                ->where('ManufacturerSerialNo', $request->query('search'))
                ->get();
        }else{
            $products = QualityControlTestItem::where('Condition', 'Perfect Condition')
            ->where('CheckedIn', false)
            ->get();
        }


        return view('serializedproduct.checkin', [
            'products' => $products
        ]);
    }

    //post
    public function checkinstore(QualityControlTestItem $item){
        $stringSerial = $this->generateSerialNo();
        $now = now('Asia/Manila');
        $serialized = SerializedProduct::make([
            'SerialNo' => $stringSerial,
            'ManufacturerSerialNo' => $item->ManufacturerSerialNo,
            'ProductID' => $item->product->ProductID,
            'AddedOn' => $now,
            'ModifiedOn' => $now,
            'AddedBy' => auth()->user()->EmployeeID,
            'ModifiedBy' => auth()->user()->EmployeeID,
            'Location' => 'Warehouse',
            'Status' => 'Brand New'
        ]);
        $result = $serialized->save();
        if($result){
            $item->update([
                'CheckedIn' => true
            ]);
            session()->flash('success', 'Product successfully checked-in.');
        }
        else{
            session()->flash('error', 'Product failed to check-in.');

        }

        return redirect(route('productCheckInList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\serializedproduct  $serializedproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(serializedproduct $serializedproduct)
    {
        //
    }

    private function generateSerialNo(){
        $maxId = Serializedproduct::max('ID');
        $maxId += 1;
        $stringId = "000000000000" . $maxId;
        $stringId = substr($stringId, strlen($stringId)-12);
        return $stringId;
    }
}
