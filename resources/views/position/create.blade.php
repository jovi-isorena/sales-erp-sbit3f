@extends('layouts.adminmodule')

@section('content')
    
<h1>Create Position</h1>
<hr>
<form action="{{ route('positionStore') }}" method="post">
    <span>Position Name: </span>
    <input type="text" name="positionname" id="positionname" value="{{ old('positionname')}}">
    <span class="text-danger text-sm fst-italic"> *
        @error('positionname')
            {{ $message }}
        @enderror
    </span>
    <hr>
    @csrf
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
                        <td><input type="checkbox" name="additem" id="additem" {{ old('additem') == 'on' ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="itemlistdetail">View Item List and Details</label></td>
                        <td><input type="checkbox" name="itemlistdetail" id="itemlistdetail" {{ old('itemlistdetail') == 'on' ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="itemmodifyarchive">Modify and Archive Item</label></td>
                        <td><input type="checkbox" name="itemmodifyarchive" id="itemmodifyarchive" {{ old('itemmodifyarchive') == 'on' ? 'checked' : '' }}></td>
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
                        <td><input type="checkbox" name="createpurchase" id="createpurchase" {{ old('createpurchase') == 'on' ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="purchaselistdetail">View Purchase Order List and Details</label></td>
                        <td><input type="checkbox" name="purchaselistdetail" id="purchaselistdetail" {{ old('purchaselistdetail') == 'on' ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="approvepurchase">Approve Purchase Order</label></td>
                        <td><input type="checkbox" name="approvepurchase" id="approvepurchase" {{ old('approvepurchase') == 'on' ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="receivepurchase">Receive Purchase Order</label></td>
                        <td><input type="checkbox" name="receivepurchase" id="receivepurchase" {{ old('receivepurchase') == 'on' ? 'checked' : '' }}></td>
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
                        <td><input type="checkbox" name="initiatetest" id="initiatetest" {{ old('initiatetest') ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="viewtestlist">View List</label></td>
                        <td><input type="checkbox" name="viewtestlist" id="viewtestlist" {{ old('viewtestlist') ? 'checked' : '' }}></td>
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
                        <td><input type="checkbox" name="createrequest" id="createrequest" {{ old('createrequest') ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="cancelrequest">Cancel Request</label></td>
                        <td><input type="checkbox" name="cancelrequest" id="cancelrequest" {{ old('cancelrequest') ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="requestlistdetail">View List and Details</label></td>
                        <td><input type="checkbox" name="requestlistdetail" id="requestlistdetail" {{ old('requestlistdetail') ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td><label for="approvedenyrequest">Approve and Deny Request</label></td>
                        <td><input type="checkbox" name="approvedenyrequest" id="approvedenyrequest" {{ old('approvedenyrequest') ? 'checked' : '' }}></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
</form>

@endsection