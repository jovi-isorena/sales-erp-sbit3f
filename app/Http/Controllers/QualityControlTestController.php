<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Product;
use App\Models\QualityControlTest;
use App\Models\QualityControlTestItem;
use Illuminate\Http\Request;

class QualityControlTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('qualitycontroltest.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $purchaseOrders = PurchaseOrder::where('Status', '<>', 'submitted')
            ->with('purchaseorderitems')
            ->get();
        return view('qualitycontroltest.create',[
            'purchaseOrders' => $purchaseOrders,
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
            'testingsite' => 'required',
            'orderno.*' => 'required',
            'productid.*' => 'required',
            'serial.*' => 'required',
            'status.*' => 'required',
            'remarks.*' => 'max:255'
        ]);

        // protected $fillable = ['TestDate', 'Tester', 'TestLocation', 'TotalTested', 'TotalGood', 'TotalDefective'];

        $total = sizeof($request->input('serial'));
        $good = array_reduce($request->input('status'), function($carry, $item){ return $item == 'Perfect Condition' ? $carry+=1 : $carry; }, 0);
        $bad = array_reduce($request->input('status'), function($carry, $item){ return $item != 'Perfect Condition' ? $carry+=1 : $carry; }, 0);
        $qtest = QualityControlTest::make([
            'TestDate' => now('Asia/Manila'), 
            'Tester' => auth()->user()->EmployeeID, 
            'TestLocation' => $request->input('testingsite'), 
            'TotalTested' => $total, 
            'TotalGood' => $good, 
            'TotalDefective' => $bad
        ]); 
        $result = $qtest->save();

        if($result){
            foreach ($request->input('serial') as $key => $product) {
    // protected $fillable = ['BatchNo', 'ProductID', 'PurchaseOrderID', 'ManufacturerSerialNo', 'Condition', 'Remarks'];
                
                // $quantity = $request->input('recquantity')[$key];
                
                $qitem = QualityControlTestItem::make([
                    'BatchNo' => $qtest->BatchNo, 
                    'ProductID' => $request->input('productid')[$key], 
                    'PurchaseOrderID' => $request->input('orderno')[$key], 
                    'ManufacturerSerialNo' => $product, 
                    'Condition' => $request->input('status')[$key], 
                    'Remarks' => $request->input('remarks')[$key],
                    'CheckedIn' => false
                ]);
                $qitem->save();
            }
        }else{
            $request->session()->flash('error', 'Test not saved.');
            return redirect()->back();
        }

        $request->session()->flash('success', 'Quality Control Test saved.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QualityControlTest  $qualityControlTest
     * @return \Illuminate\Http\Response
     */
    public function show(QualityControlTest $qualityControlTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QualityControlTest  $qualityControlTest
     * @return \Illuminate\Http\Response
     */
    public function edit(QualityControlTest $qualityControlTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QualityControlTest  $qualityControlTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QualityControlTest $qualityControlTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QualityControlTest  $qualityControlTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(QualityControlTest $qualityControlTest)
    {
        //
    }
}
