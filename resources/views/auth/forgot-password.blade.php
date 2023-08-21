<x-front.hero-section>
    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot> --}}
        <h1 class="text-lg font-bold text-center w-full">Lupa kata sandi</h1>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}" class="w-full">
            @csrf
            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" placeholder="email@domain.com" class="placeholder-gray-300 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="w-full lg:block">{{ __('Kirim Link Reset Kata Sandi') }}</x-primary-button>
            </div>
        </form>
    {{-- </x-authentication-card> --}}
</x-front.hero-section>
