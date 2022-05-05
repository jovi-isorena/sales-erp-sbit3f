@extends('layouts.adminmodule')

@section('content')
    <div class="row">
        <div class="col">
            <a href="{{ route('positionCreate') }}" class="btn btn-success">Create Position</a>
        </div>
    </div>
    <table class="table m-auto shadow w-50">
        <thead class="table-dark">
            <tr class="text-center">
                <th>Position Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($positions as $position)
                <tr>
                    <td class="align-items-center">{{ $position->PositionName }}</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('positionShow', $position->PositionID) }}" class="btn btn-primary mr-2">View</a>
                        @if ($position->isActive)
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#archivePosition{{ $position->PositionID }}">Archive</button>
                        @else
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#archivePosition{{ $position->PositionID }}">Unarchive</button>
                        @endif
                    </td>
                </tr>
                <div class="modal fade" id="archivePosition{{ $position->PositionID }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Archive Position</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($position->isActive)
                                    Are you sure you want to archive
                                @else
                                    Are you sure you want to unarchive
                                @endif
                                <br>
                                <strong>{{ '[Position:' . $position->PositionName . ']' }}</strong>
                            </div>
                            <div class="modal-footer">
                                @if ($position->isActive)
                                    <a href="{{ route('archivePosition', $position->PositionID) }}" class="btn btn-danger">Archive</a>
                                @else
                                    <a href="{{ route('unarchivePosition', $position->PositionID) }}" class="btn btn-success">Unarchive</a>
                                @endif
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection