@props(['active'])

@php
$classes = ($active ?? false)
            ? 'mx-3 py-8 gradient-border-bottom hover:gradient-border-bottom'
            : 'mx-3 py-8 hover:gradient-border-bottom';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>