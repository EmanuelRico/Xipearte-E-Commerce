@extends('layouts.app')

@section('title',"Inicia Sesión")

@section('content')

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">
            <div class="mb-3 small text-muted">
                {{ __('Gracias por registrarte! Antes de continuar, te pedimos que verifiques tu cuenta haciendo click en el link que acabamos de enviar a tu correo. Si no recibiste el correo, con gusto te enviaremos otro.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('Un nuevo link de verificación ha sido enviado al correo electronico que nos proporcionaste durante tu registro.') }}
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jet-button type="submit">
                            {{ __('Reenviar correo de verificación') }}
                        </x-jet-button>
                    </div>
                </form>

                <form method="POST" action="/logout">
                    @csrf

                    <button type="submit" class="btn btn-link">
                        {{ __('Cerrar sesión') }}
                    </button>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>

<script src="{{asset('js/app.js')}}"></script>
@endsection