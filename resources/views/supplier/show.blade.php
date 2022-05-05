@extends('layouts.inventory')

@section('content')
    <h1>Supplier's Information</h1>
    <hr>
    Company Name:
    <br>
    {{ $supplier->CompanyName }}
    <br>
    Contact number:
    <br>
    {{ $supplier->ContactNumber }}
    <br>
    Address:
    <br>
    {{ $supplier->Address }}
    <hr>
    <h3>Supplied Items</h3>
    <ul>
        @foreach ($supplier->supplierProducts as $product)
            <li>{{ $product->product->Name }}</li>
        @endforeach
    </ul>
@endsection