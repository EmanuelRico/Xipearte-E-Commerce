@extends('layouts.app')

@section('title',"Registrate")

@section('content')

<div class="container-100 d-flex justify-content-center align-items-center mt-5">
    <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <x-jet-validation-errors class="mb-3" />

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" autocomplete="off">
                    @csrf

                    <div class="mb-3">
                        <x-jet-label value="{{ __('Nombre') }}" />

                        <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                        <x-jet-input-error for="name"></x-jet-input-error>
                    </div>

                    <div class="mb-3">
                        <x-jet-label value="{{ __('Correo electrónico') }}" />

                        <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                    :value="old('email')" required />
                        <x-jet-input-error for="email"></x-jet-input-error>
                    </div>

                    <div class="mb-3">
                        <x-jet-label value="{{ __('Contraseña') }}" />

                        <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                    name="password" required autocomplete="new-password" />
                        <x-jet-input-error for="password"></x-jet-input-error>
                    </div>

                    <div class="mb-3">
                        <x-jet-label value="{{ __('Confirmar contraseña') }}" />

                        <x-jet-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mb-3">
                            <div class="custom-control custom-checkbox">
                                <x-jet-checkbox id="terms" name="terms" />
                                <label class="custom-control-label" for="terms">
                                    {!! __('De acuerdo con :terms_of_service y :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Términos').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Política de privacidad').'</a>',
                                        ]) !!}
                                </label>
                            </div>
                        </div>
                    @endif

                    <div class="mb-0">
                        <div class="d-flex justify-content-end align-items-baseline">
                            <a class="text-muted me-3" href="{{ route('login') }}">
                                {{ __('¿Ya te has registrado?') }}
                            </a>

                            <x-jet-button>
                                {{ __('Registrar') }}
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