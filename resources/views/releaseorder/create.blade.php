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
            <tbody>
                <tr>
                    <td colspan="5">
                        <select name="productid" id="" class="form-select">
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
                        <input type="num" name="quantity" id="" class="form-control" min=1 max=25>
                        @error('quantity')
                            <span>{{  $message }}</span>
                            
                        @enderror
                    </td>
                    <td colspan="1">
                        <button type="button" class=" btn btn-outline-danger rounded" aria-label="Close" onclick="removeRow(${index})">x</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row mb-3">
            <div class="col">
                <button class="btn btn-info">
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