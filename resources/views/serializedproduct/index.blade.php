@extends('layouts.inventory')

@section('content')
    <h1>Serialized Products</h1>
    <div class="row mb-3">
        <div class="col-lg-4 col-sm-12">
            <a href="{{ route('serializedCreate') }}" class="btn btn-success">Add Serial No.</a>

        </div>
    </div>
    @if ($serials->count() == 0)
        <div class="row text-center">
                <span class="lead">No Records.</span> 
        </div>
    @else
        <table class="table shadow">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Product</th>
                    <th scope="col">Added On</th>
                    <th scope="col">Last Modified On</th>
                    <th scope="col">Location</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            
                @foreach ($serials as $serial)
                    <tr>
                        <td scope="row">{{ $serial->ID }}</td>
                        <td scope="row">{{ $serial->SerialNo }}</td>
                        <td scope="row">{{ $serial->product->Name }}</td>
                        <td scope="row">{{ Carbon\Carbon::parse($serial->AddedOn)->diffForHumans() }}</td>
                        <td scope="row">{{ Carbon\Carbon::parse($serial->ModifiedOn)->diffForHumans() }}</td>
                        <td scope="row">{{ $serial->Location }}</td>
                        <td scope="row">{{ $serial->Status }}</td>
                        <td>
                            <a href="{{ route('serializedEdit', $serial->ID) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-secondary"><i class="fas fa-archive"></i></a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection