@extends('layouts.inventory')

@section('content')
    <h1>Suppliers List</h1>
    <hr>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('supplierCreate') }}" class="btn btn-success">Add Supplier</a>
        </div>
    </div>
    <table class="table text-center">
        <thead class="table-dark">
            <tr>
                <th>Supplier's Name</th>
                <th>Contact Number</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->CompanyName }}</td>
                    <td>{{ $supplier->ContactNumber }}</td>
                    <td>
                        <a href="{{ route('supplierShow', $supplier->SupplierID) }}" class="btn btn-primary">Detail</a>
                        <a href="{{ route('supplierEdit', $supplier->SupplierID) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('supplierArchive', $supplier->SupplierID) }}" class="btn btn-secondary">Archive</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection