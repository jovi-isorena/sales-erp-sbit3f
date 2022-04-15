@extends('layouts.adminmodule')


@section('content')
    <form action="{{ route('employeeStore') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="empid" class="form-label">Employee ID</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('empid')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" class="form-control" id="empid" name="empid" placeholder="Required" value={{ old('empid') ?? $latestID }}>
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('firstname')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Required" value={{ old('firstname') }}>
        </div>
        <div class="mb-3">
            <label for="middlename" class="form-label">Middle Name</label>
            <span class="text-danger text-sm fst-italic">
                @error('middlename')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Required" value={{ old('middlename') }}>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('lastname')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Required" value={{ old('lastname') }}>
        </div>
        <div class="mb-3">
            <label for="suffix" class="form-label">Suffix</label>
            <span class="text-danger text-sm fst-italic">
                @error('suffix')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Required" value={{ old('suffix') }}>
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Birthdate</label>
            <span class="text-danger text-sm fst-italic">
                @error('suffix')
                    {{ $message }}
                @enderror
            </span>
            <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Required" value={{ old('birthdate') }}>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('suffix')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" class="form-control" id="address" name="address" placeholder="Required" value={{ old('address') }}>
        </div>
        <div class="mb-3">
            <label for="contactno" class="form-label">Contact No</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('suffix')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Required" value={{ old('contactno') }}>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('department')
                    {{ $message }}
                @enderror
            </span>
            <select name="department" id="department" class="form-select">
                <option value="">Select One</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->DepartmentID }}">{{ $department->DepartmentName }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
@endsection