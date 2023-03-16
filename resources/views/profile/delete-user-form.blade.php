<x-jet-action-section>
    <x-slot name="title">
        {{ __('Supprimer le compte') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Supprimer définitivement votre compte.') }}
    </x-slot>

    <x-slot name="content">
        <div>
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger les données ou informations que vous souhaitez conserver.') }}
        </div>

        <div class="mt-3">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Supprimer le compte') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Supprimer le compte') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Êtes-vous sûr de vouloir supprimer votre compte ? Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}

                <div class="mt-2 w-md-75" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="{{ __('Password') }}"
                                 x-ref="password"
                                 wire:model.defer="password"
                                 wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')"
                                        wire:loading.attr="disabled">
                    {{ __('Annuler') }}
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="deleteUser" wire:loading.attr="disabled">
                    <div wire:loading wire:target="deleteUser" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    {{ __('Supprimer le compte') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>

</x-jet-action-section>
