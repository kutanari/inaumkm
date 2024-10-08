@props([
    'name',
    'label',
    'type' => 'text',
])

@if($label ?? null)
    @include('components.inputs.partials.label')
@endif

<select
    id="{{ $name }}"
    name="{{ $name }}"
    {{ ($required ?? false) ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'bg-gray-50 block appearance-none w-full py-1 px-2 text-base leading-normal text-gray-900 border border-gray-400 rounded']) }}
    autocomplete="off"
>{{ $slot }}</select>

@error($name)
    @include('components.inputs.partials.error')
@enderror