@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('categoryCreate') }}" class="btn btn-success">New Category</a>
</div>
<table>
    <thead>
        <tr>
            <th>Category ID</th>
            <th>Name</th>
            <th>Assigned Team</th>
            <th>Default Priority</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->CategoryID }}</td>
                <td>{{ $category->Name }}</td>
                <td>{{ $category->Team->TeamName }}</td>
                <td>{{ $category->DefaultPriority }}</td>
                <td>
                    <a href="{{ route('categoryShow', $category->CategoryID ) }}" class="btn btn-info">Details</a>
                    <a href="ticketcategory/edit/{{ $category->CategoryID }}" class="btn btn-warning">Edit</a>
                    <a href="ticketcategory/delete/{{ $category->CategoryID }}" class="btn btn-danger">Archive</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
