@props([
    'isError' => false,
    'on'
])

@php
    $class = 'bg-green-600/30';
    if($isError) {
        $class = 'bg-primary-ina-red/30';
    }
@endphp

<div wire:ignore x-data="{ shown: false, timeout: null }"
x-init="shown = true; clearTimeout(timeout); timeout = setTimeout(() => { shown = false }, 2000);"
x-show.transition.out.opacity.duration.1500ms="shown"
x-transition:leave.opacity.duration.1500ms
class="{{ $class }} backdrop-blur-xl z-20 max-w-md fixed right-5 top-5 rounded-lg p-6 shadow">
    <button aria-label="close" @click="shown = ! shown"
            class="absolute right-0 top-0 mr-2 mt-2 text-black dark:text-white dark:hover:text-black hover:text-white transition duration-150 ease-in-out cursor-pointer focus:ring-2 focus:outline-none focus:ring-gray-500 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>
    <h3 class=" text-black font-medium dark:text-white">{{ $slot }}</h3>
</div>