@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button'
])

@php
    $base = 'inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold transition duration-200';
    $variants = [
        'primary' => 'bg-emerald-700 text-white hover:bg-emerald-800 shadow-lux',
        'outline' => 'border border-emerald-700 text-emerald-700 hover:bg-emerald-50',
        'light' => 'bg-gold-300 text-midnight-900 hover:bg-gold-200',
    ];
    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
