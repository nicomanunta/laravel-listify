@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8 pt-5">
            
            <h1 class="welcome-title text-center text-uppercase mb-3 font-archivo">{{ __('Registrati') }}</h1>

            <div class="pt-5">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4 row">
                        <label for="name" class="col-md-4 col-form-label text-md-right color-grey font-archivo font-dati shadow-grey">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control input-todolist shadow @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="surname" class="col-md-4 col-form-label text-md-right color-grey font-archivo font-dati shadow-grey">{{ __('Cognome') }}</label>

                        <div class="col-md-6">
                            <input id="surname" type="text" class="form-control input-todolist shadow @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="email" class="col-md-4 col-form-label text-md-right color-grey font-archivo font-dati shadow-grey">{{ __('E-Mail') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control input-todolist shadow @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            <input id="password" type="password" class="form-control input-todolist shadow @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right color-grey font-archivo font-dati shadow-grey">{{ __('Conferma Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control input-todolist shadow" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="py-4 row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-listify-grey font-archivo color-purple">
                                {{ __('Registrati') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        
        </div>
        <div class="col-6 mt-3 position-relative">
            <i class="position-absolute fa-solid fa-list fa-list-register"></i>
            <i class="position-absolute fa-solid fa-list-ol fa-list-ol-register"></i>
            <i class="position-absolute fa-solid fa-list-ul fa-list-ul-register"></i>
            <i class="position-absolute fa-solid fa-list-check fa-list-check-register"></i>
            <i class="position-absolute fa-solid fa-check fa-check-register"></i>
            <i class="position-absolute fa-regular fa-circle-check fa-circle-check-register"></i>
            <i class="position-absolute fa-solid fa-x fa-x-register"></i>
            <i class="position-absolute fa-regular fa-circle-xmark fa-circle-xmark-register"></i>
            <i class="position-absolute fa-solid fa-pencil pencil-2-register"></i>
            <i class="position-absolute fa-regular fa-pen-to-square fa-pen-to-square-register"></i>
            <i class="position-absolute fa-solid fa-file-pen fa-file-pen-register"></i>
            <i class="position-absolute fa-solid fa-pencil pencil-1-register"></i>
            
        </div>
    </div>
</div>
@endsection
