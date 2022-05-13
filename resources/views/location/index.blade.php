@extends('layouts.adminmodule')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('adminDashboard') }}" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> Back</a>
        </div>
    </div>
    <h1>Locations</h1>
    <hr>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('locationCreate') }}" class="btn btn-success">
                Add New Location
            </a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->LocationID }}</td>
                        <td>{{ $location->Name }}</td>
                        <td>{{ $location->Address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection