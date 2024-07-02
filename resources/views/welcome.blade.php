@extends('layouts.app')
@section('content')

<div class="content pt-5 bg-color-purple color-grey overflow-hidden">
    <div class="container h-100 ">
        <div class="row ">
            <div class="col-12 ">
                <h1 class="welcome-title text-center text-uppercase mt-5 pt-3 font-archivo"> crea le tue to-do list</h1>
                <h2 class="mt-3 mb-5 welcome-subtitle text-center font-archivo">Dai un ordine alle tue attività!</h2>
                
            </div>
            <div class="col-6 text-center mt-3 height-collapse align-content-center">
                
                
                <div class="mb-3 font-archivo font-login color-grey ">ACCEDI </div>
               
            
                <div class="" id="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
    
                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right font-archivo">{{ __('E-Mail ') }}</label>
    
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control input-todolist shadow @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right font-archivo">{{ __('Password') }}</label>
    
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control input-todolist shadow @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <span class="mt-4 ">Se non hai ancora un profilo, <a class="text-decoration-none text-uppercase  " href="{{ route('register') }}"><span class="font-register font-archivo shadow">{{ __('Registrati!') }}</span></a></span>
    
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
            <div class="col-6 mt-3 position-relative">
                <i class="position-absolute fa-solid fa-list"></i>
                <i class="position-absolute fa-solid fa-list-ol"></i>
                <i class="position-absolute fa-solid fa-list-ul"></i>
                <i class="position-absolute fa-solid fa-list-check"></i>
                <i class="position-absolute fa-solid fa-check"></i>
                <i class="position-absolute fa-regular fa-circle-check"></i>
                <i class="position-absolute fa-solid fa-x"></i>
                <i class="position-absolute fa-regular fa-circle-xmark"></i>
                <i class="position-absolute fa-solid fa-pencil pencil-2"></i>
                <i class="position-absolute fa-regular fa-pen-to-square"></i>
                <i class="position-absolute fa-solid fa-file-pen"></i>
                <i class="position-absolute fa-solid fa-pencil pencil-1"></i>
                
            </div>
        </div>  
        
        
    </div>
</div>

</div>
@endsection
{{-- <a class="font-archivo zoom-shadow color-grey text-decoration-none font-login-register " href="{{ route('login') }}">{{ __('Accedi') }}</a> --}}
{{-- <a class="font-archivo zoom-shadow color-grey text-decoration-none font-login-register" href="{{ route('register') }}">{{ __('Registrati') }}</a> --}}