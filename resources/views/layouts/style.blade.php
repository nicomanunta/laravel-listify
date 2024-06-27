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
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 vh-100 bg-color-purple position-fixed overflow-auto">
                    <div class="text-center "> 
                        <img class="logo-grigio-2 mt-4 w-75" src="{{URL::asset('/images/logo-giallo-2.jpeg')}}" alt="">
                    </div>
                    <div class="mt-4">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link link-style color-grey " href="{{ url('homepage') }}">{{__('Home')}}</a>
                            </li>
                            <li class="nav-item my-2">
                                <a class="nav-link link-style color-grey " href="{{ url('profile') }}">{{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-style color-grey " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-5">
                        <ul class="navbar-nav">
                            <li class="nav-item text-uppercase color-yellow font-archivo padding-20 size-todolist"> To-do List</li>
                        </ul>
                        <ul class="navbar-nav mt-3">
                            @isset($todolists)
                                @foreach ($todolists as $todolist)
                                    <li class=" nav-item padding-20">
                                        <a class="text-decoration-none color-grey font-archivo text-uppercase size-link-todolist" href="{{route('admin.todolists.show', ['todolist' => $todolist->id])}}">
                                            {{$todolist->title}}
                                        </a>
                                    </li>
                                    <hr>
                                @endforeach
                            @endisset
                        </ul>
                        

                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-10 min-vh-100 bg-color-grey">
                    <main class=""> 
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
