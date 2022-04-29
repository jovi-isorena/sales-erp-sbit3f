@extends('layouts.inventory')

@section('content')
    <h1>Product Check-In</h1>
    <hr>
    <div class="row mb-3">
        <div class="col-lg-2 col-sm-12">
            <form action="" action="get">
                <input type="text" name="search" id="search" class="form-control search" placeholder="Search Serial here.." value={{ Request::query('search') }}>
            </form>
        </div>
    </div>
    <table class="table  text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col">Manufacturer Serial</th>
                <th scope="col">Product Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($products->count() > 0)
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->ManufacturerSerialNo }}</td>
                        <td>{{ $product->product->Name }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#checkin{{ $product->TestItemNo }}">
                                Check In
                            </button>
                        </td>
                    </tr>
                    <!-- Checkin Modal -->
                    <div class="modal fade" id="checkin{{ $product->TestItemNo }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Product Check-in</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Product: {{ $product->ManufacturerSerialNo }}
                                    <br>
                                    Item will be checked in: [Location]
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('productCheckIn', $product->TestItemNo) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Proceed</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <tr>
                    <td colspan=3 class="text-center">
                        No Product to checkin

                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection