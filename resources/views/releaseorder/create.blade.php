@extends('layouts.inventory')


@section('content')
<h1>Create Release Order</h1>
<hr>

<div class="row">
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <form action="{{ route('releaseOrderStore') }}" method="post">
        @csrf
        <table class="table">
            <thead class="table-dark">
                <tr class="text-center">
                    <th colspan="5">Product</th>
                    <th colspan="2">Quantity</th>
                    <th colspan="1"></th>
                </tr>
            </thead>
            <tbody id="entries">
                <tr id="entry0">
                    <td colspan="5">
                        <select name="productid[0]" id="productid[0]" class="form-select">
                            <option value="">Select Product</option>
                            @foreach ($products as $product)
                                <option value={{ $product->ProductID }}>{{ $product->Name }}</option>
                            @endforeach
                        </select>
                        @error('productid')
                            <span>{{  $message }}</span>
                            
                        @enderror
                    </td>
                    <td colspan="2">
                        <input type="num" name="quantity[0]" id="quantity[0]" class="form-control" min=1 max=25>
                        @error('quantity')
                            <span>{{  $message }}</span>
                            
                        @enderror
                    </td>
                    <td colspan="1">
                        <button type="button" class=" btn btn-outline-danger rounded" aria-label="Close" onclick="removeRow(0)">x</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row mb-3">
            <div class="col">
                <button class="btn btn-info" type="button" id="addEntry">
                    Add Entry
                </button>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <button class="btn btn-success">
                    Place Order
                </button>
            </div>
        </div>



    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#addEntry').on('click', ()=>{
            let entries = $('#entries');
            let index = 1 + Number(entries.children().last().attr('id').split('entry')[1]);
            console.log(entries.children().last().attr('id').split('entry')[1]);
            entries.append(`
                <tr id="entry${index}">
                    <td colspan="5">
                        <select name="productid[${index}]" id="productid[${index}]" class="form-select">
                            <option value="">Select Product</option>
                            @foreach ($products as $product)
                                <option value={{ $product->ProductID }}>{{ $product->Name }}</option>
                            @endforeach
                        </select>
                        @error('productid')
                            <span>{{  $message }}</span>
                            
                        @enderror
                    </td>
                    <td colspan="2">
                        <input type="num" name="quantity[${index}]" id="quantity[${index}]" class="form-control" min=1 max=25>
                        @error('quantity')
                            <span>{{  $message }}</span>
                            
                        @enderror
                    </td>
                    <td colspan="1">
                        <button type="button" class=" btn btn-outline-danger rounded" aria-label="Close" onclick="removeRow(${index})">x</button>
                    </td>
                </tr>`);

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