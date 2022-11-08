@extends('layouts.app')

@section('title',"Olvidé mi contraseña")

@section('content')

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <div class="mb-3">
                {{ __('¿Olvidaste tu contraseña? No hay problema. Solo déjanos saber tu correo electrónico y te enviaremos un link a tu correo que te permitirá cambiarla.') }}
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/forgot-password">
                @csrf

                <div class="mb-3">
                    <x-jet-label value="Correo electronico" />
                    <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-jet-button>
                        {{ __('Enviar link de cambio de contraseña') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>

<script src="{{asset('js/app.js')}}"></script>
@endsection