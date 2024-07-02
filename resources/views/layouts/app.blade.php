<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Listify') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
   
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-color-grey shadow-header position-fixed z-1 w-100">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center width-link-logo" href="{{ url('/') }}">
                    <div class="text-start">
                        <img class="logo-grigio-2" src="{{URL::asset('/images/logo-viola-2.jpeg')}}" alt="">
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link color-purple link-app  padding-home" href="{{url('/') }}">{{ __('Home') }}</a>
                            </li>
                        </ul>
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link color-purple link-app  padding-login" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link color-purple link-app  padding-register" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link link-app color-purple  padding-register" href="{{ url('homepage') }}">{{__('Home')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-app color-purple  padding-register" href="{{ url('profile') }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-app color-purple  padding-register" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                        {{-- <li class="nav-item ">
                           
                            

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Auth::user()->name')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li> --}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
