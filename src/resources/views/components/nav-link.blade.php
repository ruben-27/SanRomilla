@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex flex-row items-center h-12 px-4 text-gray-600 bg-gray-100 lg:border-l-4 border-[#f7dc6f]'
            : 'flex flex-row items-center h-12 px-4 text-gray-600 hover:bg-gray-100 lg:border-l-4 border-transparent hover:border-[#f7dc6f]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
