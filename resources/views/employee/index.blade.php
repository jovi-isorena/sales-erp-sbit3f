@extends('layouts.adminmodule')

@section('content')
    <h1>Employee List</h1>
    <hr>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('employeeCreate') }}" class="btn btn-success">Add Employees</a>
        </div>
    </div>
    <table class="table shadow mb-3  text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col">Employee No.</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Registered?</th>
                <th scope="col">Account Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->EmployeeID }}</td>
                    <td>{{ $employee->FirstName . ' ' . $employee->LastName . ' ' . $employee->Suffix}}</td>
                    <td>{{ $employee->isActive == 1 ? 'Regular' : 'Contractual' }}</td>
                    <td>{{ $employee->systemaccount != null ? 'Yes' : 'No' }}</td>
                    <td>
                        @if ($employee->systemaccount == null )
                            <a href="{{ route('userCreate', $employee->EmployeeID) }}" class="btn btn-primary">Create Account</a>
                            
                        @else
                            {{-- if account is deactivated --}}
                            @if($employee->systemaccount->isActive == 0)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reactivate{{ $employee->EmployeeID }}">Reactivate Account</button>
                            {{-- if account is active --}}
                            @else
                                <a href="{{ route('userEdit', $employee->EmployeeID) }}" class="btn btn-primary">Manage Access</a>
                                @if($employee->systemaccount->isActive == 1)
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deactivate{{ $employee->EmployeeID }}">Deactivate Account</button>
                                    {{-- if account is locked --}}
                                @elseif($employee->systemaccount->isActive == 2)
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#unlock{{ $employee->EmployeeID }}">Unlock Account</button>
                                @endif
                            @endif
                        @endif
                    </td>
                </tr>
                {{-- deactivate modal --}}
                <div class="modal fade" id="deactivate{{ $employee->EmployeeID }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <form action="{{ route('userDeactivate', $employee->EmployeeID) }}" method="post">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Deactivate User Account</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Please select reason for deactivation
                                    <br>
                                    <select name="reason" id="reason" class="form-select">
                                        <option value="">Employee Terminated</option>
                                        <option value="">Employee Suspended</option>
                                        <option value="">Account Compromised</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Deactivate</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- /deactivate modal --}}
                {{-- reactivate modal --}}
                <div class="modal fade" id="reactivate{{ $employee->EmployeeID }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <form action="{{ route('userReactivate', $employee->EmployeeID) }}" method="post">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Reactivate User Account</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Please select reason for reactivation
                                    <br>
                                    <select name="reason" id="reason" class="form-select">
                                        <option value="">Deactivation mistake</option>
                                        <option value="">Employee Rehire</option>
                                        <option value="">Suspension Ended</option>
                                        <option value="">Account Secured</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Reactivate</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- /reactivate modal --}}
                {{-- lock modal --}}
                <div class="modal fade" id="unlock{{ $employee->EmployeeID }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <form action="{{ route('userUnlock', $employee->EmployeeID) }}" method="post">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Lock User Account</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Please select reason for account unlock
                                    <br>
                                    <select name="reason" id="reason" class="form-select">
                                        <option value="">Employee Request</option>
                                        <option value="">System Error</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Unlock</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- /lock modal --}}
            @endforeach
        </tbody>
    </table>
@endsection