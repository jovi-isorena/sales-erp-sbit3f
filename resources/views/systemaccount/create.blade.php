@extends('layouts.adminmodule')

@section('content')
    <h1>System Account Registration</h1>
    <hr>
    <div class="row">
        <div class="col">
            Employee No: <strong>{{ $employee->EmployeeID }}</strong>
            <br>
            Employee Name: <strong>{{ $employee->Firstname . ' ' . $employee->MiddleName . ' ' .$employee->LastName . ' ' . $employee->Suffix }}</strong>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('userStore', $employee->EmployeeID) }}" method="POST">
            @csrf
            <input type="hidden" name="employeeid" value={{ $employee->EmployeeID }}>
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
                        <option value="{{ $position->PositionID }}">{{ $position->PositionName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">Create Account</button>
                </div>
            </div>
        </form>
    </div>
@endsection