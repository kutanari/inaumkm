<x-front.hero-section>
    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot> --}}
        <h1 class="text-xl font-bold text-center w-full">Daftar</h1>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="w-full">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nama') }}" />
                <x-input placeholder="nama" id="name" class="placeholder-gray-300 block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input placeholder="email@domain.com" id="email" class="placeholder-gray-300 block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Kata sandi') }}" />
                <x-input placeholder="********" id="password" class="placeholder-gray-300 block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Konfirmasi kata sandi') }}" />
                <x-input placeholder="********" id="password_confirmation" class="placeholder-gray-300 block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('Setuju :terms_of_service', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Syarat dan Ketentuan').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Kebijakan').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="items-center justify-end mt-4">
                <x-primary-button class="w-full lg:block">{{ __('Daftarkan') }}</x-primary-button>
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Sudah terdaftar?') }}
                </a>
            </div>
        </form>
    {{-- </x-authentication-card> --}}
</x-front.hero-section>
