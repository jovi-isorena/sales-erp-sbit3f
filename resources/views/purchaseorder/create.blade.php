@extends('layouts.inventory')

@section('content')
    <div>
        <form action="{{ route('purchaseOrderStore') }}" method="post">
            @csrf
            <div class="row mb-3">
                <label for="supplier">Supplier:
                    <span class="text-danger text-sm fst-italic"> *
                        @error('supplier')
                            {{ $message }}
                        @enderror
                    </span>
                </label>
                <select name="supplier" id="supplier" class="form-select">
                    <option value="" hidden>Select Supplier</option>
                    <option value="Porneloss Merchant">Porneloss Merchant</option>
                    <option value="Briones Distributors, Inc.">Brioness Distributors, Inc.</option>
                    <option value="2Zone Unlimited Corp.">2Zone Unlimited Corp.</option>
                </select>
            </div>
            <hr>
            <h3>Order Items</h3>
            <div id="entries">
                <div class="row mb-3 align-items-center" id="entry0">
                    <div class="col-9">
                        <select name="productid[0]" id="productid[0]" class="form-select">
                            <option value="" hidden>Product ID</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->ProductID }}">{{ $product->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        <input type="number" name="quantity[0]" id="quantity[0]" class="form-control" min="1">
                    </div>
                    <div class="col-1">
                        <button class="btn-close" onclick="removeRow(0)"></button>
                    </div>
                </div>
                
            </div>
            <div class="row">
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
    </script>
@endsection