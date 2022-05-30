@extends('layouts.app')

@section('title',"Inicia Sesión")

@section('content')
<div class="container-100 d-flex justify-content-center align-items-center">
    <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
                <h3 class="text-center">Iniciar Sesión</h3>
            </x-slot>
    
            <div class="card-body">
    
                <x-jet-validation-errors class="mb-3 rounded-0" />
    
                @if (session('status'))
                    <div class="alert alert-success mb-3 rounded-0" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
    
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <x-jet-label value="{{ __('Correo electronico') }}" />
    
                        <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                     name="email" :value="old('email')" required />
                        <x-jet-input-error for="email"></x-jet-input-error>
                    </div>
    
                    <div class="mb-3">
                        <x-jet-label value="{{ __('Contraseña') }}" />
    
                        <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                                     name="password" required autocomplete="current-password" />
                        <x-jet-input-error for="password"></x-jet-input-error>
                    </div>
    
                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <label class="custom-control-label" for="remember_me">
                                {{ __('Recuerdame') }}
                            </label>
                        </div>
                    </div>
    
                    <div class="mb-0">
                        <div class="d-flex justify-content-end align-items-baseline">
                            @if (Route::has('password.request'))
                                <a class="text-muted me-3" href="{{ route('password.request') }}">
                                    {{ __('Olvidé mi contraseña') }}
                                </a>
                            @endif
    
                            <x-jet-button>
                                {{ __('Ingresar') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>
            </div>
        </x-jet-authentication-card>
    </x-guest-layout>
    
    <script src="{{asset('js/app.js')}}"></script>
</div>
@endsection