@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600 dark:text-red-400">{{ __('Oops!, Ada yang salah.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600 dark:text-red-400">
            @foreach ($errors->all() as $error)
                <li>{{ __($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif
