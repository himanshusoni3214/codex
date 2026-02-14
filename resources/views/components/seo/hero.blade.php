@props([
    'eyebrow' => null,
    'title' => '',
    'subtitle' => '',
])

<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-14">
        @if($eyebrow)
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">{{ $eyebrow }}</p>
        @endif
        <h1 class="font-display text-4xl text-midnight-900 mt-3">{{ $title }}</h1>
        @if($subtitle)
            <p class="text-lg text-midnight-600 mt-4 max-w-3xl">{{ $subtitle }}</p>
        @endif
    </div>
</section>

