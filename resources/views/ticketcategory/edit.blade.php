@extends('layouts.app')

@section('content')
    <a href="{{ route('categories') }}" class="btn btn-secondary">Back To List</a>
    <form method="POST" action="{{ route('categoryUpdate', $category->CategoryID) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Required" value={{ old('name')??$category->Name }}>
        </div>
        <div class="mb-3">
            <label for="assignedTeam" class="form-label">Assigned Team</label>
            <select class="form-select custom-select" id="assignedTeam" name="assignedTeam">
                @foreach($teams as $team)
                    <option value="{{ $team->TeamID }}" {{$category->Team->is($team) || old('assignedTeam') == $team->TeamID?'selected':'';}}>{{ $team->TeamName }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="priorityLevel" class="form-label">Priority Level</label>
            <select class="form-select custom-select" id="priorityLevel" name="priorityLevel">
                @for ($i = 1; $i <= 3; $i++)
                    <option value="{{ $i }}" {{$category->DefaultPriority==$i || old('priorityLevel') == $i ?'selected':'';}}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection