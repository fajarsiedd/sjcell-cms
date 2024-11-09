@props(['active' => false])

@php
    $classes = $active
        ? 'flex items-center p-2 bg-gray-100 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'
        : 'flex items-center p-2 bg-white text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
