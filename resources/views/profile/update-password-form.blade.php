<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Actualizar Contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegurate de que tu cuenta esté usando una contraseña larga y difícil para mantener segura tu cuenta.') }}
    </x-slot>

    <x-slot name="form">
        <div class="w-md-75">
            <div class="mb-3">
                <x-jet-label for="current_password" value="{{ __('Contraseña Actual') }}" />
                <x-jet-input id="current_password" type="password" class="{{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                             wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password" />
            </div>

            <div class="mb-3">
                <x-jet-label for="password" value="{{ __('Nueva Contraseña') }}" />
                <x-jet-input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                             wire:model.defer="state.password" autocomplete="new-password" />
                <x-jet-input-error for="password" />
            </div>

            <div class="mb-3">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-jet-input id="password_confirmation" type="password" class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                             wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>

            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
