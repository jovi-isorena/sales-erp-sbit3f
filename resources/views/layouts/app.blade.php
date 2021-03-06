<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset("images/3gency-logo-3gonly-white.svg") }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/22e96e7343.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md custom-bg-primary  shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}" style="text-decoration: none">
                    <img src="{{ asset('images/3gency-logo-3gonly-white.svg') }}" alt="" style="width: 50px">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    @auth
                        
                        <ul class="navbar-nav mr-auto ">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('categories') }}">Ticket Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('sla') }}">Service Level Agreement</a>
                            </li>
                            @if(!session()->has('CustomerID'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('customer') }}" target="_blank">Customer Load</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('myTicket') }}">Customer's Tickets</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('queue') }}">Queue Monitoring</a>
                            </li>
                        </ul>
                        
                    @endauth
                    
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        {{-- @guest --}}
                            {{-- @if(!auth()->check()) --}}
                                {{-- <li class="nav-item ">
                                    <a class="nav-link btn btn-primary text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li> --}}
                            {{-- @else --}}
                                {{-- <li class="nav-item ">
                                    <a class="nav-link btn btn-primary text-light" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                                </li>  
                            @endif --}}
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <span>Hi, {{ auth()->user()->employee->FirstName }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
