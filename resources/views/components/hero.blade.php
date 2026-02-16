@props([
    'title',
    'subtitle' => null,
    'cta' => null,
    'image' => '/images/hero-gem.svg',
    'imageAlt' => 'Certified gemstone',
])

@once
    @push('preload')
        <link rel="preload" as="image" href="{{ $image }}" fetchpriority="high">
    @endpush
@endonce

<section class="bg-gemstone-glow relative overflow-hidden">
    <div class="absolute inset-0 bg-subtle-grid opacity-50"></div>
    <div class="max-w-6xl mx-auto px-4 py-16 lg:py-24 relative z-10 grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700 font-semibold">Natural Gem Store</p>
            <h1 class="font-display text-4xl lg:text-5xl text-midnight-900 mt-3 leading-tight">{{ $title }}</h1>
            @if($subtitle)
                <p class="text-lg text-midnight-700 mt-4 leading-relaxed">{{ $subtitle }}</p>
            @endif
            <div class="mt-6 flex flex-wrap gap-4">
                @if($cta)
                    <x-button href="{{ $cta['url'] ?? '#' }}">{{ $cta['label'] ?? 'Shop Gemstones' }}</x-button>
                @endif
                <x-button href="{{ route('education') }}" variant="outline">Learn About Certification</x-button>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -top-8 -left-8 w-24 h-24 rounded-full bg-gold-200 blur-2xl opacity-70"></div>
            <div class="bg-white/90 shadow-lux rounded-3xl p-8 border border-platinum">
                <img
                    src="{{ $image }}"
                    alt="{{ $imageAlt }}"
                    class="w-full h-64 object-cover rounded-2xl"
                    loading="eager"
                    fetchpriority="high"
                    decoding="async"
                    width="960"
                    height="640"
                >
                <div class="mt-6 grid grid-cols-2 gap-4 text-sm">
                    <div class="bg-ivory px-4 py-3 rounded-xl">
                        <p class="text-emerald-700 font-semibold">Certified</p>
                        <p class="text-midnight-600">GIA / IGI Reports</p>
                    </div>
                    <div class="bg-ivory px-4 py-3 rounded-xl">
                        <p class="text-emerald-700 font-semibold">Transparent</p>
                        <p class="text-midnight-600">Treatment Disclosure</p>
                    </div>
                    <div class="bg-ivory px-4 py-3 rounded-xl">
                        <p class="text-emerald-700 font-semibold">Ethical</p>
                        <p class="text-midnight-600">Sourcing Standards</p>
                    </div>
                    <div class="bg-ivory px-4 py-3 rounded-xl">
                        <p class="text-emerald-700 font-semibold">Canada-first</p>
                        <p class="text-midnight-600">Local Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
