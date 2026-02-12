<header class="bg-white/90 backdrop-blur border-b border-platinum sticky top-0 z-40">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ $settings['logo_path'] ?? '/images/natural-gem-logo.svg' }}" alt="Natural Gem" class="h-10 w-10">
            <div>
                <p class="font-display text-lg text-midnight-900">{{ $settings['site_name'] ?? 'Natural Gem' }}</p>
                <p class="text-xs uppercase tracking-[0.28em] text-midnight-500">Certified Natural Gemstones</p>
            </div>
        </a>

        <nav class="hidden lg:flex items-center gap-6 text-sm font-medium">
            <a href="{{ route('gemstones') }}" class="hover:text-emerald-700">Gemstones</a>
            <a href="{{ route('education') }}" class="hover:text-emerald-700">Education</a>
            <a href="{{ route('about') }}" class="hover:text-emerald-700">About</a>
            <a href="{{ route('consultation') }}" class="hover:text-emerald-700">Traditional Consultation</a>
            <a href="{{ route('testimonials') }}" class="hover:text-emerald-700">Reviews</a>
            <a href="{{ route('contact') }}" class="hover:text-emerald-700">Contact</a>
        </nav>

        <div class="hidden lg:flex items-center gap-3">
            <span class="text-sm text-midnight-500">{{ $settings['contact_phone'] ?? '+1 (647) 555-0199' }}</span>
            <x-button href="{{ route('gemstones') }}">Shop Gemstones</x-button>
        </div>

        <button class="lg:hidden" data-menu-toggle aria-label="Toggle Menu">
            <svg class="h-6 w-6 text-midnight-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 6h18M3 12h18M3 18h18" />
            </svg>
        </button>
    </div>

    <div class="lg:hidden hidden" data-menu>
        <div class="px-4 pb-4 pt-2 space-y-2 bg-white border-t">
            <a href="{{ route('gemstones') }}" class="block py-1">Gemstones</a>
            <a href="{{ route('education') }}" class="block py-1">Education</a>
            <a href="{{ route('about') }}" class="block py-1">About</a>
            <a href="{{ route('consultation') }}" class="block py-1">Traditional Consultation</a>
            <a href="{{ route('testimonials') }}" class="block py-1">Reviews</a>
            <a href="{{ route('contact') }}" class="block py-1">Contact</a>
            <a href="{{ route('gemstones') }}" class="block py-2 font-semibold text-emerald-700">Shop Gemstones</a>
        </div>
    </div>
</header>
