@extends('layouts.crmadmin')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        {{-- <div class=" justify-content-center py-3 px-5 custom-border-primary custom-rounded mb-3">
            <img src="{{ asset('images/3gency-logo-full-blue.svg') }}" alt="" style="width: 200px;" class="ml-auto">

        </div> --}}
        <div class="col-md-8">
            <div class="card custom-shadow border-0">
                <div class="card-header custom-bg-secondary  custom-text-primary fs-5">{{ __('Welcome! Please log-in to proceed.') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('sessionStore') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset("images/3gency-logo-3gonly-blue-sm.svg") }}" class="border-3 custom-rounded custom-border-primary" alt="" style="width:100%;height:100%;">
                            </div>
                            <div class="col-md-9">
                                <div class="form-group d-flex mb-3">
                                    <label for="username" class="col-md-3 col-form-label text-md-right">{{ __('Username') }}</label>
                                    
                                    <div class="col-md-9">
                                        {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
                                        <input id="username" type="text" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autofocus>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        
                                    </div>
                                </div>
        
                                <div class="form-group d-flex mb-3">
                                    <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>
        
                                    <div class="col-md-9">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-9 offset-md-3">
                                        <button type="submit" class="btn custom-btn-secondary custom-text-primary w-50 rounded-pill">
                                            {{ __('Login') }}
                                        </button>
        
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
