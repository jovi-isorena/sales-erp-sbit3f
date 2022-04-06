@extends('layouts.inventory')

@section('content')
<a href="{{ route('inventoryMaintenance') }}" class="btn btn-secondary">Back To List</a>
@if (session()->has('updateSuccess'))
    <div class="alert alert-success">
        {{ sesssion()->get('updateSuccess') }}
    </div>

@endif
    
<form method="POST" action="{{ route('updateProduct', $product->ProductID) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" class="form-control" id="name" name="name" placeholder="Required" value="{{ old('name')??$product->Name }}">
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('brand')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Required" value="{{ old('brand')??$product->Brand }}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('category')
                        {{ $message }}
                    @enderror
                </span>
                <select class="form-select custom-select" id="category" name="category">
                    <option value="Motherboard">Motherboard</option>
                    <option value="Keyboard">Keyboard</option>
                    <option value="Mouse">Mouse</option>
                    <option value="LCD Monitor">LCD Monitor</option>
                    <option value="Power Supply">Power Supply</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="specification" class="form-label">Specification</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('specification')
                        {{ $message }}
                    @enderror
                </span>
                <textarea name="specification" id="specification" class="form-control">{{ old('specification')??$product->Specification }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Selling Price</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('price')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" class="form-control" id="price" name="price" placeholder="Required" value="{{ old('price')??$product->SellingPrice }}">
            </div>
            <div class="mb-3">
                <label for="onsale" class="form-label">On Sale</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('onsale')
                        {{ $message }}
                    @enderror
                </span>
                <input type="check" class="form-control" id="onsale" name="onsale" placeholder="Required" value="{{ old('onsale')??$product->OnSale }}">
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <label for="image" class="form-label">Product Image</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('image')
                    {{ $message }}
                @enderror
            </span>
            <input type="file" name="image" id="image">
            <img src="" alt="" srcset="">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection