@extends('layouts.inventory')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-6 col-lg-3 h-120 rounded text-white mb-4" style="height: 180px;">
            <a href="{{ route('inventoryDashboard') }}" style="text-decoration: none;">
                <div class="bigbox custom-btn-outline-primary">
                    <h3>Inventory<br>Dashboard</h3> 
                </div>  
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 h-120 rounded text-white mb-4" style="height: 180px;">
            <a href="{{ route('inventoryDashboard') }}" style="text-decoration: none;">
                <div class="bigbox custom-btn-outline-primary">
                    <h3>Item<br>List</h3>   
                </div>      
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 h-120 rounded text-white mb-4" style="height: 180px;">
            <a href="{{ route('inventoryDashboard') }}" style="text-decoration: none;">
                <div class="bigbox custom-btn-outline-primary">
                    <h3>Item<br>Tracker</h3>
                </div>  
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 h-120 rounded text-white mb-4" style="height: 180px;">
            <a href="{{ route('supplierIndex') }}" style="text-decoration: none;">
                <div class="bigbox custom-btn-outline-primary">
                    <h3>Suppliers</h3>  
                </div>  
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 h-120 rounded text-white mb-4" style="height: 180px;">
            <a href="{{ route('purchaseOrderIndex') }}" style="text-decoration: none;">
                <div class="bigbox custom-btn-outline-primary">
                    <h3>Purchase<br>Order List</h3> 
                </div>  
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 h-120 rounded text-white mb-4" style="height: 180px;">
            <a href="{{ route('purchaseOrderCreate') }}" style="text-decoration: none;">
                <div class="bigbox custom-btn-outline-primary">
                    <h3>Create<br>Purchase<br>Order</h3>
                </div>  
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 h-120 rounded text-white mb-4" style="height: 180px;">
            <a href="{{ route('inventoryDashboard') }}" style="text-decoration: none;">
                <div class="bigbox custom-btn-outline-primary">
                    <h3>Quality<br>Control Test<br>List</h3>
                </div>  
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 h-120 rounded text-white mb-4" style="height: 180px;">
            <a href="{{ route('inventoryDashboard') }}" style="text-decoration: none;">
                <div class="bigbox custom-btn-outline-primary">
                    <h3>Initiate<br>Quality Control<br>Test</h3>
                </div>  
            </a>
        </div>
    </div>
@endsection