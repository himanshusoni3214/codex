@props([
    'title' => 'Related guides',
    'context' => 'default',
    'data' => [],
    'links' => null,
    'max' => 4,
])

@php
    $resolvedLinks = collect($links ?? app(\App\Services\InternalLinkService::class)->for((string) $context, (array) $data, (int) $max))
        ->filter(fn ($link) => !empty($link['label'] ?? null) && !empty($link['url'] ?? null))
        ->take(min(max((int) $max, 1), 4));
@endphp

@if($resolvedLinks->isNotEmpty())
    <section {{ $attributes->merge(['class' => 'bg-white rounded-3xl p-5 border border-platinum shadow-lux']) }}>
        <h2 class="font-display text-xl text-midnight-900">{{ $title }}</h2>
        <ul class="mt-3 space-y-2 text-sm text-midnight-600">
            @foreach($resolvedLinks as $link)
                <li>
                    <a href="{{ $link['url'] }}" class="underline underline-offset-4 decoration-midnight-300 hover:text-emerald-700 hover:decoration-emerald-700">
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
@endif
