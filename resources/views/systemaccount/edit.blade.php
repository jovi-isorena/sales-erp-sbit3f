@extends('layouts.adminmodule')

@section('content')
    <h1>Manage Account Access</h1>
    <hr>
    <div class="row">
        <div class="col">
            Employee No: <strong>{{ $user->employee->EmployeeID }}</strong>
            <br>
            Employee Name: <strong>{{ $user->employee->Firstname . ' ' . $user->employee->MiddleName . ' ' .$user->employee->LastName . ' ' . $user->employee->Suffix }}</strong>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('userUpdate', $user->EmployeeID) }}" method="POST">
            @csrf
            @method('put')
            <div class="row mb-3">
                <label for="position">Position</label>
                <span class="text-danger text-sm fst-italic"> *
                    @error('position')
                        {{ $message }}
                    @enderror
                </span>
                <select name="position" id="position" class="form-select">
                    <option value="">Select One</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position->PositionID }}" {{ $position->PositionID ==  $user->employee->Position ? 'selected' : '' }}>{{ $position->PositionName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">Update Account</button>
                </div>
            </div>
        </form>
    </div>
@endsection