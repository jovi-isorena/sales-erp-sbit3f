@extends('layouts.inventory')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('inventoryLandingPage') }}" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> Back</a>
        </div>
    </div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Item Name</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Item Count</th>
                <th scope="col" class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->product->Name }}</td>
                    <td class="text-center">
                        @if ($stock->Capacity == 0)
                            <span class="badge badge-secondary">UNSET</span>
                        @elseif($stock->AvailableStock <= $stock->BufferLimit)
                            <span class="badge badge-dark">BUFFER</span>
                        @elseif ($stock->AvailableStock <= $stock->CriticalLevel)
                            <span class="badge badge-danger">CRITICAL</span>
                        @elseif ($stock->AvailableStock <= $stock->RestockLevel)
                            <span class="badge badge-warning">RESTOCK</span>
                        @else
                            <span class="badge badge-success">ADEQUATE</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $stock->AvailableStock . '/' . $stock->Capacity }}</td>
                    <td><a href="{{ route('warehouseStockShow', $stock->ProductID) }}">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection