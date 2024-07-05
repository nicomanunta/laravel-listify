@extends('layouts.app')

@section('content')
<div class="container  pt-5 ">
    <div class="row pt-5 justify-content-center">
        <div class="col-md-8 pt-5">
            
            <h1 class="welcome-title text-center text-uppercase mb-5 font-archivo">{{ __('Accedi') }}</h1>

            <div class="pt-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4 row">
                        <label for="email" class="col-md-4 col-form-label text-md-right color-grey font-archivo font-dati shadow-grey">{{ __('E-Mail') }}</label>

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
                        <label for="password" class="col-md-4 col-form-label text-md-right color-grey font-archivo font-dati shadow-grey">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control input-todolist shadow @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                
                    <div class="py-4 row ">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-listify-grey font-archivo color-purple">
                                {{ __('Accedi') }}
                            </button>

                            
                        </div>
                    </div>
                </form>
            </div>
        
        </div>
        <div class="col-6 mt-3 position-relative">
            <i class="position-absolute fa-solid fa-list fa-list-login"></i>
            <i class="position-absolute fa-solid fa-list-ol fa-list-ol-login"></i>
            <i class="position-absolute fa-solid fa-list-ul fa-list-ul-login"></i>
            <i class="position-absolute fa-solid fa-list-check fa-list-check-login"></i>
            <i class="position-absolute fa-solid fa-check fa-check-login"></i>
            <i class="position-absolute fa-regular fa-circle-check fa-circle-check-login"></i>
            <i class="position-absolute fa-solid fa-x fa-x-login"></i>
            <i class="position-absolute fa-regular fa-circle-xmark fa-circle-xmark-login"></i>
            <i class="position-absolute fa-solid fa-pencil pencil-2-login"></i>
            <i class="position-absolute fa-regular fa-pen-to-square fa-pen-to-square-login"></i>
            <i class="position-absolute fa-solid fa-file-pen fa-file-pen-login"></i>
            <i class="position-absolute fa-solid fa-pencil pencil-1-login"></i>
            
        </div>
    </div>
</div>
@endsection
