@extends('layouts.inventory')

@section('content')
<h1>Product Maintenance</h1>
<div class="mb-3">
    @if (session()->has('success'))
        <span class="alert alert-success">{{ session()->get('success') }}</span>
    @endif
</div>
<div class="mb-3">
    <div class="row justify-content-between">
        <div class="col">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                New Product
            </button>
        </div>

        {{-- <div class="col justify-content-center"> --}}
            <div class="col-2 btn-group" role="group" aria-label="status filter">
                <a href="{{ route('inventoryMaintenance') }}" class="btn btn-outline-primary {{ request()->query('status') != 'archived'? 'active' : ''  }}">Active</a>
                <a href="{{ route('inventoryMaintenance', 'status=archived') }}" class="btn btn-outline-primary {{ request()->query('status') == 'archived'? 'active' : '' }}">Archived</a>
            </div>
        {{-- </div> --}}


    </div>
</div>
@if ($products->count() <= 0)
    <div class="row text-center">
        <span class="lead">No Product.</span>
    </div>
@else
    <table class="table text-center border rounded shadow">
        <thead class="table-dark">
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->ProductID }}</td>
                    <td>{{ $product->Name }}</td>
                    <td>{{ $product->Brand }}</td>
                    <td>{{ $product->Category }}</td>
                    
                    <td>
                        <a href="" class="btn btn-info">Details</a>
                        <a href="{{ route('editProduct',$product->ProductID) }}" class="btn btn-warning">Edit</a>
                        @if ($product->isActive)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#archiveProduct{{ $product->ProductID }}">Archive</button>
                        @else
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#archiveProduct{{ $product->ProductID }}">Unarchive</button>
                        @endif
                    </td>
                </tr>
                <!--Archive Modal -->
                <div class="modal fade" id="archiveProduct{{ $product->ProductID }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Archive Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($product->isActive)
                                    Are you sure you want to archive
                                @else
                                    Are you sure you want to unarchive
                                @endif
                                <br>
                                <strong>{{ '[ID:' . $product->ProductID . '] - ' . $product->Name }}</strong>
                            </div>
                            <div class="modal-footer">
                                @if ($product->isActive)
                                    <a href="{{ route('archiveProduct', $product->ProductID, ) }}" class="btn btn-danger">Archive</a>
                                @else
                                    <a href="{{ route('unarchiveProduct', $product->ProductID) }}" class="btn btn-success">Unarchive</a>
                                @endif
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endif

{{-- add product modal --}}
<input type="hidden" name="errorExist" id="errorExist" value="{{ $errors->any() }}">

<div class="modal fade" id="addProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addProductModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addProduct') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <span class="text-danger text-sm fst-italic"> *
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Required" value={{ old('name') }}>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <span class="text-danger text-sm fst-italic"> *
                            @error('brand')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Required" value={{ old('brand') }}>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Category</label>
                        <span class="text-danger text-sm fst-italic"> *
                            @error('category')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Required" value={{ old('category') }}>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Specification</label>
                        <span class="text-danger text-sm fst-italic"> *
                            @error('specification')
                            {{ $message }}
                            @enderror
                        </span>
                        <textarea class="form-control" id="specification" name="specification" placeholder="Required" >{{ old('specification') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Selling Price</label>
                        <span class="text-danger text-sm fst-italic"> *
                            @error('price')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Required" value={{ old('price') }}>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Product Image</label>
                        <span class="text-danger text-sm fst-italic"> *
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Required" value={{ old('image') }}>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end add product modal --}}


@endsection

@section('headScripts')
<script>
    $(document).ready(()=>{
        if($('#errorExist').val() == '1'){
            $(window).on('load', function() {
                $('#addProductModal').modal('show');
            });
        };

    });
</script>
@endsection