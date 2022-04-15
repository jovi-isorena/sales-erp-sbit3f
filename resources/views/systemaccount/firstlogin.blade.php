@extends('layouts.emptylayout')

@section('content')
<x-flash-messages/>
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Default Password Change</h3>
            </div>
            <div class="card-body text-center">
                <p>This is your first login to the system. As part of the security, you are required to change your password.</p>
                <form action="{{ route('changePassword', auth()->user()->EmployeeID) }}" method="post">
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col">
                            <label for="curpass">Current Password</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('curpass')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input type="text" name="curpass" id="curpass" class="form-control text-center">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="newpass">New Password</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('newpass')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input type="text" name="newpass" id="newpass" class="form-control text-center">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="conpass">Confirm Password</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('conpass')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input type="text" name="conpass" id="conpass" class="form-control text-center">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection