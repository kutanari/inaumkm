@props(['active', 'activeClass', 'defaultClass'])

@php
$classes = ($active ?? false)
            ? $activeClass . ' py-4 bg-primary-ina-orange'
            : $defaultClass . ' py-4';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>