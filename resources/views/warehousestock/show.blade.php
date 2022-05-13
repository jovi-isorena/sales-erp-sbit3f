@extends('layouts.inventory')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('warehouseStockIndex') }}" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> Back</a>
        </div>
    </div>
    <h1>Stock Information</h1>
    <hr>
    <p>Item Name: <strong>{{ $stock->product->Name }}</strong></p>
    <p>Status: 
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
    </p>
    <form action="{{ route('warehouseStockUpdate', $stock->ProductID) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="mb-3 col-6">
                <label for="capacity" class="form-label">Capacity</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('capacity')
                        {{ $message }}
                    @enderror
                </span>
                <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Required" value={{ old('capacity') ?? $stock->Capacity }} min=0 readonly>
            </div>
            <div class="mb-3 col-6">
                <label for="restock" class="form-label">Restock Level</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('restock')
                        {{ $message }}
                    @enderror
                </span>
                <input type="number" class="form-control" id="restock" name="restock" placeholder="Required" value={{ old('restock') ?? $stock->RestockLevel }} min=0 readonly>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="critical" class="form-label">Critical Level</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('critical')
                        {{ $message }}
                    @enderror
                </span>
                <input type="number" class="form-control" id="critical" name="critical" placeholder="Required" value={{ old('critical') ?? $stock->CriticalLevel }} min=0 readonly>
            </div>
            <div class="mb-3 col-6">
                <label for="buffer" class="form-label">Buffer Level</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('buffer')
                        {{ $message }}
                    @enderror
                </span>
                <input type="number" class="form-control" id="buffer" name="buffer" placeholder="Required" value={{ old('buffer') ?? $stock->BufferLimit }} min=0 readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" id="editbtn" onclick="updatemode(true)">Edit</button>
                <button type="submit" class="btn btn-primary" style="display:none;" id="updatebtn">Update</button>
                <button type="button" class="btn btn-secondary" style="display:none;" id="cancelbtn" onclick="updatemode(false)">Cancel</button>
    
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function updatemode(toggle){
            if(!toggle){
                location.reload();
            }else{
                let inputs = $('input[type="number"]');
                inputs.each((index, element)=>{
                    if(toggle){
                        element.removeAttribute('readonly');
                    }else{
                    }  
                });
                $('#editbtn').hide();
                $('#updatebtn').show();
                $('#cancelbtn').show();
            }
        }
    </script>
@endsection