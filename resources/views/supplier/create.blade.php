@extends('layouts.inventory')

@section('content')
    <h1>Add Supplier</h1>
    <hr>
    <form action="{{ route('supplierStore') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="mb-3">
                    <label for="companyname" class="form-label">Company Name</label>
                    <span class="text-danger text-sm fst-italic"> *
                        @error('companyname')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Required" value={{ old('companyname') }}>
                </div>
                <div class="mb-3">
                    <label for="contactnumber" class="form-label">Contact Number</label>
                    <span class="text-danger text-sm fst-italic"> *
                        @error('contactnumber')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="text" class="form-control" id="contactnumber" name="contactnumber" placeholder="Required" value={{ old('contactnumber') }}>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <span class="text-danger text-sm fst-italic"> *
                        @error('contactnumber')
                            {{ $message }}
                        @enderror
                    </span>
                    <textarea class="form-control" id="address" name="address" placeholder="Required">{{ old('contactnumber') }}</textarea>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="border rounded shadow p-3" style="height: fit-content;">
                    <h3>Item Supplied</h3>
                    <label for="productlist" class="form-label">Select Product</label>
                    <div class="d-flex h-auto mb-3">
                        <select name="productlist" id="productlist" class="form-select">
                            @foreach ($products as $product)
                                <option value="{{ $product->ProductID }}">{{ $product->Name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-primary" onclick="additem()">
                            Add Item
                        </button>
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Item</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="products">
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- ['CompanyName', 'ContactNumber', 'Address', --}}
        
       
        <div class="row">
            <div class="col">
                <button class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function additem(){
            let prodid = $('#productlist').val();
            let prodname = $('#productlist').find(":selected").text();
            let list = $('#products');
            if(!isAdded(prodid)){
                let index = list.children().length == 0 ? 0 : 1 + Number(list.children().last().attr('id').split('entry')[1]);
                let row = `
                    <tr id="entry${index}">
                        <td><input type="hidden" name="product[${index}]" value=${prodid}>${prodname}</td>
                        <td class="text-right"><button type="button" class="btn-close btn btn-danger" onclick=removeRow(${index})></button></td>
                    </tr>`;
                list.append(row);    
            }
            else{
                alert('Item is already added.');
            }
            console.log(list.children().length);
        }

        function isAdded(productid){
            if($(`#products :input[value='${productid}']`).length > 0){
                return true;
            }
            return false;
        }

        function removeRow(rowNo){
            let rowDiv = $(`#entry${rowNo}`);
            rowDiv.remove();
        }
    </script>
    
@endsection