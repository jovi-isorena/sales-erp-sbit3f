@extends('layouts.crmadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @auth
                        <span>{{ __('You are logged in! Welcome, ') . auth()->user()->employee->FirstName }}</span>
                       
                    @else
                        {{ __('You are logged out. Please login.') }}  

                    @endauth

                    @guest
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
