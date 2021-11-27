@extends('layouts.app')

@section('content')
<div class="mb-3">
    <a href="{{ route('categoryCreate') }}" class="btn btn-success">New Category</a>
</div>
@if ($categories->count() <= 0)
    <div class="row text-center">
        <span class="lead">No Records. Please create new.</span>
    </div>
@else
    <table class="table text-center">
        <thead class="table-info">
            <tr>
                <th>Category ID</th>
                <th>Name</th>
                <th>Assigned Team</th>
                <th>Default Priority</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->CategoryID }}</td>
                    <td>{{ $category->Name }}</td>
                    <td>{{ $category->team->TeamName }}</td>
                    <td>{{ $category->DefaultPriority }}</td>
                    <td>
                        <a href="{{ route('categoryShow', $category->CategoryID ) }}" class="btn btn-info">Details</a>
                        <a href="{{ route('categoryEdit', $category->CategoryID ) }}" class="btn btn-warning">Edit</a>
                        <a href="ticketcategory/delete/{{ $category->CategoryID }}" class="btn btn-danger">Archive</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
