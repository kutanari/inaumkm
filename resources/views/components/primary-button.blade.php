<button {{ $attributes->merge(['type' => 'submit', 'class' => 'shadow-sm bg-primary-ina-red px-7 py-3 rounded-md text-neutral-white bg-gradient-to-r from-primary-ina-red to-primary-ina-red-darker hover:from-primary-ina-red-darker hover:to-primary-ina-red-darker hover:button-brightness']) }}>
    {{ $slot }}
</button>
