@extends('layouts.adminmodule')

@section('content')
<div class="row mb-3">
    <div class="col">
        <a href="{{ route('positionIndex') }}" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> Back</a>
    </div>
</div>
<h1>Position Detail</h1>
<hr>
<span>Position ID: </span>
{{ $position->PositionID }}
<br>
<form action="{{ route('positionUpdate', $position->PositionID) }}" method="post">
    <span>Position Name: </span>
    <input type="text" name="positionname" id="positionname" value="{{ old('positionname') ?? $position->PositionName }}">
    <hr>
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <table class="table border border-1 ">
                <thead class="table-secondary">
                    <tr>
                        <th>Item Maintenance</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for="additem">Add Item</label></td>
                        <td><input type="checkbox" name="additem" id="additem" {{ $position->AddItem ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="itemlistdetail">View Item List and Details</label></td>
                        <td><input type="checkbox" name="itemlistdetail" id="itemlistdetail" {{ $position->ItemListDetail ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="itemmodifyarchive">Modify and Archive Item</label></td>
                        <td><input type="checkbox" name="itemmodifyarchive" id="itemmodifyarchive" {{ $position->ModifyArchiveItem ? 'checked' : '' }}></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-lg-6">
            <table class="table border border-1 ">
                <thead class="table-secondary">
                    <tr>
                        <th>Purchase Order</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for="createpurchase">Create Purchase Order</label></td>
                        <td><input type="checkbox" name="createpurchase" id="createpurchase" {{ $position->CreatePurchaseOrder ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="purchaselistdetail">View Purchase Order List and Details</label></td>
                        <td><input type="checkbox" name="purchaselistdetail" id="purchaselistdetail" {{ $position->PurchaseOrderListDetail ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="approvepurchase">Approve Purchase Order</label></td>
                        <td><input type="checkbox" name="approvepurchase" id="approvepurchase" {{ $position->PurchaseOrderApprove ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="receivepurchase">Receive Purchase Order</label></td>
                        <td><input type="checkbox" name="receivepurchase" id="receivepurchase" {{ $position->PurchaseOrderReceive ? 'checked' : '' }}></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-lg-6">
            <table class="table border border-1 ">
                <thead class="table-secondary">
                    <tr>
                        <th>Quality Control</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for="initiatetest">Initiate Quality Control Test</label></td>
                        <td><input type="checkbox" name="initiatetest" id="initiatetest" {{ $position->InitiateQualityControl ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="viewtestlist">View List</label></td>
                        <td><input type="checkbox" name="viewtestlist" id="viewtestlist" {{ $position->QualityControlListDetail ? 'checked' : '' }}></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-lg-6">
            <table class="table border border-1 ">
                <thead class="table-secondary">
                    <tr>
                        <th>Restock Request</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for="createrequest">Create Request</label></td>
                        <td><input type="checkbox" name="createrequest" id="createrequest" {{ $position->CreateRestockRequest ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="cancelrequest">Cancel Request</label></td>
                        <td><input type="checkbox" name="cancelrequest" id="cancelrequest" {{ $position->CancelRestockRequest ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="requestlistdetail">View List and Details</label></td>
                        <td><input type="checkbox" name="requestlistdetail" id="requestlistdetail" {{ $position->RestockRequestListDetail ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="approvedenyrequest">Approve and Deny Request</label></td>
                        <td><input type="checkbox" name="approvedenyrequest" id="approvedenyrequest" {{ $position->RestockApproveDeny ? 'checked' : '' }}></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary w-100">Save Position</button>
    </div>
</form>

@endsection