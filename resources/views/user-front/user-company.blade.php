<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil Usaha') }} <span class="text-sm underline float-right"><a href="{{ route('preview-compro', '1') }}">Pratinjau</a></span>
        </h2>
    </x-slot>
    <div class="sm:py-6 md:py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:user-company-form :company="$company" :nr_of_employee="$nr_of_employee" :categories="$categories" :jenis_usaha="$jenis_usaha" />
        </div>
    </div>
</x-app-layout>