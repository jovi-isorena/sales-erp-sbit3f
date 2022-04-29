@extends('layouts.inventory')


@php
    $categories = $products->pluck('Category')->unique();
    
    // dd($categories);

@endphp
@section('content')

    <h1>Add Serialized Products</h1>
    <hr>
    <div class="row">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ route('serializedStore') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class=" col-md-12 col-lg-6">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" col-md-12 col-lg-6">
                    <label for="product">Product</label>
                    <select name="product" id="product" class="form-select">
                        @foreach ($products as $product)
                        <option value="{{ $product->ProductID }}">{{ $product->Name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-lg-7 col-sm-12 text-center">
                    <span>Serial No.</span>
                </div>
                <div class="col-lg-2 col-sm-12 text-center">
                    <span>Location</span>
                </div>
                <div class="col-lg-2 col-sm-12 text-center">
                    <span>Status</span>
                </div>
            </div>
            <div id="entries">

                <div class="row mb-3" id="entry0">
                    <div class="col-lg-7 col-sm-12 text-center">
                        <input type="text" name="serial[0]" id="" class="form-control" required>
                    </div>
                    <div class="col-lg-2 col-sm-12 text-center">
                        <select name="location[0]" id="" class="form-select">
                            <option value="Warehouse">Warehouse</option>
                            <option value="Store">Store</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Customer">Customer</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-sm-12 text-center">
                        <select name="status[0]" id="" class="form-select">
                            <option value="Brand New">Brand New</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Missing">Missing</option>
                            <option value="Refurbished">Refurbished</option>
                            <option value="Decomissioned">Decommissioned</option>
                        </select>
                    </div>
                    <div class="col-lg-1 col-sm-12 text-center align-items-center">
                        <button type="button" class=" btn btn-outline-danger rounded" aria-label="Close" onclick="removeRow(0)">x</button>
                    </div>
                    @error('serial[0]')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-lg-3">
                    <button class="btn btn-info" id="addEntry" type="button">Add Entry</button>
                </div>
            </div>
            <div class="row mb-3">
                <button type="submit" class='btn btn-success'>Save</button>
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
            entries.append(`<div class="row mb-3" id="entry${index}">
                    <div class="col-lg-7 col-sm-12 text-center">
                        <input type="text" name="serial[${index}]" id="" class="form-control" required>
                    </div>
                    <div class="col-lg-2 col-sm-12 text-center">
                        <select name="location[${index}]" id="" class="form-select">
                            <option value="Warehouse">Warehouse</option>
                            <option value="Store">Store</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Customer">Customer</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-sm-12 text-center">
                        <select name="status[${index}]" id="" class="form-select">
                            <option value="Brand New">Brand New</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Missing">Missing</option>
                            <option value="Refurbished">Refurbished</option>
                            <option value="Decomissioned">Decommissioned</option>
                        </select>
                    </div>
                    <div class="col-lg-1 col-sm-12 text-center align-items-center">
                        <button type="button" class=" btn btn-outline-danger rounded" aria-label="Close" onclick="removeRow(${index})">x</button>
                    </div>
                </div>`);

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