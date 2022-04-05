@extends('layouts.app')

@section('title',"Mi Perfil")

@section('content')

<x-guest-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container my-5">
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')

            <x-jet-section-border />
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')

            <x-jet-section-border />
        @endif

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            @livewire('profile.two-factor-authentication-form')

            <x-jet-section-border />
        @endif

        @livewire('profile.logout-other-browser-sessions-form')

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-jet-section-border />

            @livewire('profile.delete-user-form')
        @endif
    </div>
</x-guest-layout>

<script src="{{asset('js/app.js')}}"></script>
@endsection
