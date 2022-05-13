@extends('layouts.inventory')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('inventoryLandingPage') }}" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> Back</a>
        </div>
    </div>
    <div>
        <form action="#" method="GET" id="supplierForm">
            @csrf
            <div class="row mb-3">
                <label for="supplier">Supplier:
                    <span class="text-danger text-sm fst-italic"> *
                        @error('supplier')
                            {{ $message }}
                        @enderror
                    </span>
                </label>
                <select name="supplier" id="supplier" class="form-select" onchange="updateProductDropdown()">
                    <option value="" hidden>Select Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value={{ $supplier->SupplierID }}>{{ $supplier->CompanyName }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <hr>
        @if ($supplier === NULL)
            <form action="{{ route('purchaseOrderStore') }}" method="post">
                @csrf
                <h3>Order Items</h3>
                <div id="entries">
                    <div class="row mb-3 align-items-center" id="entry0">
                        <div class="col-9">
                            <select name="productidselect" id="productidselect" class="form-select">
                                <option value="" hidden>Select Item</option>
                                {{-- @foreach ($products as $product)
                                    <option value="{{ $product->ProductID }}">{{ $product->Name }}</option>
                                @endforeach --}}
                                @foreach ($suppliers as $supplier)
                                    @foreach ($supplier->products as $product)
                                        <option value="{{ $product->ProductID }}" data-bind="{{ $supplier->SupplierID }}" hidden>{{ $product->Name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1">
                            <input type="number" name="quantityinput" id="quantityinput" class="form-control" min="1">
                        </div>
                        <div class="col-1">
                            <button class="btn-close" onclick="removeRow(0)"></button>
                            {{-- <button class="btn btn-primary" type="button" id="addEntry">Add Entry</button> --}}
            
                        </div>
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button class="btn btn-primary" type="button" id="addEntry">Add Entry</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
           
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        $('#addEntry').on('click',()=>{
            let entries = $('#entries');
            let index = 1 + Number(entries.children().last().attr('id').split('entry')[1]);
            entries.append(`
                <div class="row mb-3 align-items-center" id="entry${index}">
                    <div class="col-9">
                        <select name="productid[${index}]" id="productid[${index}]" class="form-select">
                            <option value="" hidden>Product ID</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->ProductID }}">{{ $product->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        <input type="number" name="quantity[${index}]" id="quantity[${index}]" class="form-control" min="1">
                    </div>
                    <div class="col-1">
                        <button class="btn-close" onclick="removeRow(${index})"></button>
                    </div>
                </div>
            `);
        });

        function removeRow(rowNo){
            let rowDiv = $(`#entry${rowNo}`);
            rowDiv.remove();
        }

        function updateProductDropdown(){
            // let supplierID = $('#supplier').val();
            // console.log(supplierID);
            // productSelect = $('productidselect');
            // console.log(productSelect.children());
            $('#supplierForm').submit();
        
        }
    </script>
@endsection