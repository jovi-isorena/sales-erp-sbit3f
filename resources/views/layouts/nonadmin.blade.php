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
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <script src="https://kit.fontawesome.com/22e96e7343.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body  style="overflow:hidden;">
    <div id="app" class="d-flex justify-content-between">
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
        <div id="sidenav" class="sidenav  custom-shadow d-flex flex-column justify-content-center" data-toggle-val=1>

        
            <div class=" py-2 px-2" style="z-index: 10; background-color: white">
                <div class=" h-100 d-flex flex-column justify-content-center ">
                    <img src="{{ asset('images/3gency-logo-full-blue.png') }}" alt="3Gency Logo" class="brandlogo ml-auto" id="fulllogo">
                    <img src="{{ asset('images/3gency-logo-3gonly-blue.svg') }}" alt="3Gency Logo" class="brandlogo custom-border-primary rounded-circle border-2" id="smalllogo" style="display:none">
                    <div id="navbar-full" class=" " style="display:block;">
                        <ul class="custom-navbar">
                            <a class="nav-link" href="{{ route('repDashboard') }}"><li class="custom-btn-outline-primary custom-rounded py-2 text-nowrap "><i class="fas fa-chart-line mr-4"></i>Dashboard</li></a>
                            <a class="nav-link" href="{{ route('repTickets') }}"><li class="custom-btn-outline-primary custom-rounded py-2 text-nowrap "><i class="fas fa-receipt mr-4"></i>Tickets</li> </a>
                            <a class="nav-link" href="#"><li class="custom-btn-outline-primary custom-rounded py-2 text-nowrap "><i class="far fa-address-card mr-4"></i>Profile</li></a>
                        </ul>
                    </div>
                    <div id="navbar-collapse" class=" " style="display:none;">
                        <ul class="custom-navbar">
                            <a class="nav-link" href="{{ route('home') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard"><li class="custom-btn-outline-primary custom-rounded py-2"><i class="fas fa-chart-line"></i></li></a>
                            <a class="nav-link" href="{{ route('repTickets') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Tickets"><li class="custom-btn-outline-primary custom-rounded py-2"><i class="fas fa-receipt"></i></i></li> </a>
                            <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Profile"><li class="custom-btn-outline-primary custom-rounded py-2"><i class="far fa-address-card"></i></li></a>
                        </ul>
                    </div>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    class="text-white logoutbtn "
                    id="logoutfull">
                        <div class="bg-danger text-center text-white custom-rounded p-1" id="logoutdiv" >
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}
                        </div>
                            
                    </a>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    class="text-white logoutbtn"
                    id="logoutcollapse"
                    style="display: none;">
                        <div class="bg-danger text-center text-white custom-rounded p-1" id="logoutdiv" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                            <i class="fas fa-sign-out-alt"></i>
                            
                        </div>
                            
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" id="hiddenid" value = {{ auth()->user()->EmployeeID }}>
                        <input type="hidden" id="hiddenteamid" value = {{ auth()->user()->employee->TeamID }}>
                        <input type="hidden" id="hiddenpositionid" value = {{ auth()->user()->employee->Position }}>
                    </form>

                    {{-- <button id="open-sidenav" class="custom-bg-primary text-light custom-border-primary rounded-circle navtoggle" style="display:none;"><i class="fas fa-chevron-right pl-4"></i></button> --}}
                </div>
            </div>
        
            <button id="toggle-sidenav" class="custom-bg-primary text-light custom-border-primary rounded-circle navtoggle" style="z-index:5;"> <span class="ml-4"></span><i class="fas fa-chevron-left" id="arrow-icon"></i></button>
        </div>
        <div class="maindisplay" style="">
            <div class=" sticky-top pt-2 bg-light">
                <div class="custom-bg-primary custom-rounded  px-3 p-1 w-100 text-light fs-5 justify-content-between d-flex">
                    <span>Hi, {{ auth()->user()->employee->FirstName.' '. auth()->user()->employee->LastName}}</span>
                    @if(auth()->user()->employee->Position == 7)
                        <div>
                            <select name="" id="statusselect" class="custom-bg-primary text-white border-0" onchange="changeStatus(this)">
                                {{  $stat = auth()->user()->employee->queue->OnlineStatus }}
                                <option value="Hold" {{ $stat == 'Hold' ? 'selected' : '' }}>Hold</option>
                                <option value="Active" {{ $stat == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Break" {{ $stat == 'Break' ? 'selected' : '' }}>Break</option>
                                <option value="Lunch" {{ $stat == 'Lunch' ? 'selected' : '' }}>Lunch</option>
                                <option value="Away"  {{ $stat == 'Away' ? 'selected' : '' }}>Away</option>
                            </select>
                            <span  data-time-source="statustimer" class="timer"> 00:00:00 </span> 
                            <input type="hidden" id="statustimer" value="{{ auth()->user()->employee->queue->EnqueueTime }}">  
                            
                        </div>
                    @endif
                    <span>{{ auth()->user()->employee->position->PositionName }}</span>
                </div>
            </div>

            <main class="py-4 container">
                <x-flash-messages/>
                @yield('content')
            </main>
        </div>
        
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/sidenavanimate.js') }}"></script>
    <script src="{{ asset('js/statuschange.js') }}"></script>
    <script src="{{ asset('js/timer.js') }}"></script>
    @yield('scripts')

</body>
</html>
