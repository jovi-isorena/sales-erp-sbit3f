@extends('layouts.crmadmin')

@section('content')
    <a href="{{ route('categories') }}" class="btn btn-secondary">Back to List</a>
    <form method="POST" action="{{ route('categoryStore') }}">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Required" value={{ old('name') }}>
            
        </div>
        <div class="mb-3">
            <label for="assignedTeam" class="form-label">Assigned Team</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('assignedTeam')
                    {{ $message }}
                @enderror
            </span>
            <select class="form-select custom-select" id="assignedTeam" name="assignedTeam">
                <option hidden value="">Select Team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->TeamID }}" {{ old('assignedTeam') == $team->TeamID ? 'selected':'' }}>{{ $team->TeamName }}</option>
                @endforeach
            </select>
            
        </div>
        <div class="mb-3">
            <label for="priorityLevel" class="form-label">Priority Level</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('priorityLevel')
                    {{ $message }}
                @enderror
            </span>
            <select class="form-select custom-select" id="priorityLevel" name="priorityLevel">
                <option hidden value="">Select Priority Level</option>
                @for ($i = 1; $i <= 3; $i++)
                    <option value="{{ $i }}" {{old('priorityLevel')==$i?'selected':'';}}>{{ $i }}</option>
                @endfor
                
            </select>
            
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

@endsection