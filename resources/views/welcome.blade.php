@extends('layouts.app')
@section('content')

<div class="content pt-5 bg-color-purple color-grey">
    <div class="container h-100 ">
        <div class="row ">
            <div class="col-12 ">
                <h1 class="welcome-title text-center text-uppercase mt-5 pt-3 font-archivo"> crea le tue to-do list</h1>
                <h2 class="mt-3 mb-5 welcome-subtitle text-center font-archivo">Dai un ordine alle tue attività!</h2>
                
            </div>
        </div>  
        <div class="col-6 text-center mt-3 height-collapse align-content-center">
            
            <button class=" bg-color-purple border-0 mb-4" type="button" data-bs-toggle="collapse" data-bs-target="#loginForm" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="font-archivo font-login color-grey ">Accedi <i class="fa-solid fa-caret-down"></i></span>
            </button>
        
            <div class="collapse navbar-collapse mt-2" id="loginForm">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4 row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <span class="pt-4">Se non hai ancora un profilo, <a class="text-decoration-none text-uppercase font-register font-archivo " href="{{ route('register') }}">{{ __('Registrati') }}</a></span>

                    <div class="my-4 row x">
                        <div class="text-center">
                            <button type="submit" class="btn btn-listify-grey font-archivo color-purple">
                                {{ __('Accedi') }}
                            </button>
                        
                        </div>
                    </div>
                    
                </form>
            </div>
        
                
        </div>
        
        
    </div>
</div>

</div>
@endsection
{{-- <a class="font-archivo zoom-shadow color-grey text-decoration-none font-login-register " href="{{ route('login') }}">{{ __('Accedi') }}</a> --}}
{{-- <a class="font-archivo zoom-shadow color-grey text-decoration-none font-login-register" href="{{ route('register') }}">{{ __('Registrati') }}</a> --}}