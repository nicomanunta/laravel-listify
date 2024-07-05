@extends('layouts.app')
@section('content')
<div class="py-5">

    <div class="container pt-5">
        <h1 class="welcome-title text-uppercase font-archivo py-5 text-center">
            {{ __('Modifica profilo') }}
        </h1>
        <div class="card p-4 mb-4 bg-color-grey shadow rounded-lg border-0">
    
            @include('profile.partials.update-profile-information-form')
    
        </div>
    
        <div class="card p-4 mb-4 bg-color-grey shadow rounded-lg">
    
    
            @include('profile.partials.update-password-form')
    
        </div>
    
        <div class="card p-4  bg-color-grey shadow rounded-lg ">
    
    
            @include('profile.partials.delete-user-form')
    
        </div>
    </div>
</div>

@endsection
