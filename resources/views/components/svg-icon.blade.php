@props(['active' => false])

@php
    $classes = $active
        ? 'text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-50 dark:group-hover:text-white'
        : 'text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white';
@endphp

<svg {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</svg>
