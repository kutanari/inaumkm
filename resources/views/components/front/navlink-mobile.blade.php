@props(['active', 'activeClass', 'defaultClass'])

@php
$classes = ($active ?? false)
            ? $activeClass . ' py-2 bg-slate-100'
            : $defaultClass . ' py-2';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>