<x-jet-action-section>
    <x-slot name="title">
        {{ __('Authentification à deux facteurs') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ajoutez une sécurité supplémentaire à votre compte en utilisant l\'authentification à deux facteurs.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="h5 font-weight-bold">
            @if ($this->enabled)
                {{ __('Vous avez activé l\'authentification à deux facteurs.') }}
            @else
                {{ __('Vous n avez pas activé l\'authentification à deux facteurs.') }}
            @endif
        </h3>

        <p class="mt-3">
            {{ __('Lorsque l\'authentification à deux facteurs est activée, vous serez invité à saisir un jeton aléatoire sécurisé lors de l\'authentification. Vous pouvez récupérer ce jeton à partir de l\'application Google Authenticator de votre téléphone.') }}
        </p>

        @if ($this->enabled)
            @if ($showingQrCode)
                <p class="mt-3">
                    {{ __('L\'authentification à deux facteurs est maintenant activée. Scannez le code QR suivant à l\'aide de l\'application d\'authentification de votre téléphone ou entrez la clé de configuration.') }}
                </p>

                <div class="mt-3">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <p class="mt-3">
                    {{ __('Stockez ces codes de récupération dans un gestionnaire de mots de passe sécurisé. Ils peuvent être utilisés pour récupérer laccès à votre compte si votre dispositif d\'authentification à deux facteurs est perdu.') }}
                </p>

                <div class="bg-light rounded p-3">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-3">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('Permettre') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="me-3">
                            <div wire:loading wire:target="regenerateRecoveryCodes" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            {{ __('Régénérer les codes de récupération') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="me-3">
                            <div wire:loading wire:target="showRecoveryCodes" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            {{ __('Afficher les codes de récupération') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        <div wire:loading wire:target="disableTwoFactorAuthentication" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        {{ __('Désactiver') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>