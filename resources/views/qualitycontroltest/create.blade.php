@extends('layouts.inventory')

@section('content')
    <h1>New Quality Control Test</h1>
    <hr>
    <form action="{{ route('qualityControlTestStore') }}" method="POST">
        <div class="row">
            @csrf
            <div class="col">
                Test Date:<br> 
                <strong class="lead">{{ now('Asia/Manila') }} </strong>
            </div>
            <div class="col">
                Testing Site: 
                <select name="testingsite" id="testingsite" class="form-select">
                    <option value="Warehouse">Warehouse</option>
                    <option value="Store-Batasan Branch">Store-Batasan Branch</option>
                    <option value="Store-San Francisco Branch">Store-San Francisco Branch</option>
                    <option value="Store-San Bartolome Branch">Store-San Bartolome Branch</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h2>Test Items</h2>
            </div>
        </div>
            <div id="entries">
                <div class="row mb-3 shadow-sm border p-3" id="entry0">
                <div class="col-12 mb-2 ">
                    <button class="btn-close" onclick="removeRow(0)"></button>
                </div>
                <div class="col">
                    <select name="orderno[0]" id="orderno[0]" class="form-select" onchange="updateProduct(0)">
                        <option value="" hidden>Purchase Order</option>
                        @foreach ($purchaseOrders as $purchaseOrder)
                            <option value="{{ $purchaseOrder->ID }}">{{ $purchaseOrder->ID }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="productid[0]" id="productid[0]" class="form-select">
                        <option value="" hidden>Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->ProductID }}">{{ $product->Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-5">
                    <input type="text" name="serial[0]" id="serial[0]" class="form-control" placeholder="Serial Number">
                </div>
                <div class="col">
                    <select name="status[0]" id="status[0]" class="form-select">
                        <option value="Perfect Condition">Perfect Condition</option>
                        <option value="With Physical Damage">Physical Issue</option>
                        <option value="With Physical Damage">Software Issue</option>
                        <option value="With Physical Damage">Physical and Software Issue</option>
                    </select>
                </div>
                <div class="col-12 mt-3">
                    <textarea name="remarks[0]" id="remarks[0]" placeholder="Remarks" class="form-control"></textarea>
                </div>
                
            </div>
            
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <button type="button" class="btn btn-primary" id="addEntry">Add Item</button>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#addEntry').on('click', ()=>{
            
            let entries = $('#entries');
            let index = 1 + Number(entries.children().last().attr('id').split('entry')[1]);
            entries.append(`
            <div class="row mb-3 shadow-sm border p-3" id="entry${index}">
                <div class="col-12 mb-2 ">
                    <button class="btn-close" onclick="removeRow(${index})"></button>
                </div>
                <div class="col">
                    <select name="orderno[${index}]" id="orderno[${index}]" class="form-select" onchange="updateProduct(${index})">
                        <option value="" hidden>Purchase Order</option>
                        @foreach ($purchaseOrders as $purchaseOrder)
                            <option value="{{ $purchaseOrder->ID }}">{{ $purchaseOrder->ID }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="productid[${index}]" id="productid[${index}]" class="form-select">
                        <option value="" hidden>Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->ProductID }}">{{ $product->Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-5">
                    <input type="text" name="serial[${index}]" id="serial[${index}]" class="form-control" placeholder="Serial Number">
                </div>
                <div class="col">
                    <select name="status[${index}]" id="status[${index}]" class="form-select">
                        <option value="Perfect Condition">Perfect Condition</option>
                        <option value="With Physical Damage">Physical Issue</option>
                        <option value="With Physical Damage">Software Issue</option>
                        <option value="With Physical Damage">Physical and Software Issue</option>
                    </select>
                </div>
                <div class="col-12 mt-3">
                    <textarea name="remarks[${index}]" id="remarks[${index}]" placeholder="Remarks" class="form-control"></textarea>
                </div>
                
            </div>
            `);

        });

    });
    
</script>    

<script>
    function removeRow(rowNo){
        let rowDiv = $(`#entry${rowNo}`);
        rowDiv.remove();
    }
</script>
@endsection