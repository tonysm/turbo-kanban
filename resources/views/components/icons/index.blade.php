@props(['size' => 'md'])

@php
    $classes = match ($size) {
        default => 'w-6 h-6',
    };
@endphp

<svg {{ $attributes->merge(['xmlns' => 'http://www.w3.org/2000/svg', 'class' => $classes]) }}>
    {{ $slot }}
</svg>
