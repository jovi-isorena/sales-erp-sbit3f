<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body  style="overflow-x:hidden;scrollbar-gutter: none;">
    <div id="app" class="row justify-content-center">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    @auth
                        
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('repTickets') }}">Tickets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Profile</a>
                            </li>
                            
                        </ul>
                        
                    @endauth
                    
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                    <input type="hidden" id="hiddenid" value = {{ auth()->user()->EmployeeID }}>
                                    <input type="hidden" id="hiddenteamid" value = {{ auth()->user()->employee->TeamID }}>
                                    <input type="hidden" id="hiddenpositionid" value = {{ auth()->user()->employee->Position }}>
                                </form>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav> --}}
        <div class="sidenav py-2 px-2 " style="">
            <div class=" h-100 d-flex flex-column justify-content-between">
                <img src="{{ asset('images/3gency-logo.png') }}" alt="3Gency Logo" class="brandlogo rounded">
                <div>
                    <ul class="custom-navbar">
                        <a class="nav-link" href="{{ route('home') }}"><li class="custom-btn-outline-primary custom-rounded py-2 fs-4"><i class="fas fa-chart-line mr-4"></i>Dashboard</li></a>
                        <a class="nav-link" href="{{ route('repTickets') }}"><li class="custom-btn-outline-primary custom-rounded py-2 fs-4 "><i class="far fa-sticky-note mr-4"></i>Tickets<div class=" badge custom-bg-secondary text-white ml-5"> 2</div></li> </a>
                        <a class="nav-link" href="#"><li class="custom-btn-outline-primary custom-rounded py-2 fs-4"><i class="far fa-address-card mr-4"></i>Profile</li></a>
                    
                    
                    </ul>
                </div>

                <div class="bg-danger text-center text-white custom-rounded p-1">
                    {{-- <span class="fs-4">Logout</span> --}}
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" id="hiddenid" value = {{ auth()->user()->EmployeeID }}>
                        <input type="hidden" id="hiddenteamid" value = {{ auth()->user()->employee->TeamID }}>
                        <input type="hidden" id="hiddenpositionid" value = {{ auth()->user()->employee->Position }}>
                    </form>
                </div>

                <button class="custom-bg-primary text-light custom-border-primary rounded-circle navtoggle" style="display: block"> <i class="fas fa-chevron-left pl-4"></i></button>
                <button class="custom-bg-primary text-light custom-border-primary rounded-circle navtoggle" style="display:none;"><i class="fas fa-chevron-right pl-4"></i></button>
            </div>
        </div>
        <div class="maindisplay" style="">
            <div class=" sticky-top pt-2 bg-light">
                <div class="custom-bg-primary custom-rounded  px-3 p-1 w-100 text-light fs-5 justify-content-between d-flex">
                    <span>Hi, {{ auth()->user()->employee->FirstName.' '. auth()->user()->employee->LastName}}</span>
                    <span>{{ auth()->user()->employee->position->PositionName }}</span>
                </div>
            </div>

            <main class="py-4 container">
                @yield('content')
            </main>
        </div>
        
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @yield('scripts')

</body>
</html>
