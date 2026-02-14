<header class="bg-white/90 backdrop-blur border-b border-platinum sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center gap-6">
        <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 lg:min-w-[270px]">
            <img src="{{ $settings['logo_path'] ?? '/images/natural-gem-logo.svg' }}" alt="Natural Gem" class="h-10 w-10">
            <div class="leading-tight">
                <p class="font-display text-lg text-midnight-900">{{ $settings['site_name'] ?? 'Natural Gem' }}</p>
                <p class="text-xs uppercase tracking-[0.24em] text-midnight-500">Certified Natural Gemstones</p>
            </div>
        </a>

        <nav class="hidden lg:flex flex-1 items-center justify-center gap-4 xl:gap-6 text-sm font-medium whitespace-nowrap">
            <a href="{{ route('gemstones') }}" class="hover:text-emerald-700 transition-colors">Gemstones</a>
            <a href="{{ route('gemstones') }}#browse-by-type" class="hover:text-emerald-700 transition-colors">Browse by Gemstone Type</a>
            <a href="{{ route('gemstones') }}#browse-by-origin" class="hover:text-emerald-700 transition-colors">Browse by Origin</a>
            <a href="{{ route('education') }}" class="hover:text-emerald-700 transition-colors">Education</a>
            <a href="{{ route('about') }}" class="hover:text-emerald-700 transition-colors">About</a>
            <a href="{{ route('consultation') }}" class="hover:text-emerald-700 transition-colors">Traditional Consultation</a>
            <a href="{{ route('testimonials') }}" class="hover:text-emerald-700 transition-colors">Reviews</a>
            <a href="{{ route('contact') }}" class="hover:text-emerald-700 transition-colors">Contact</a>
        </nav>

        <div class="hidden lg:flex items-center gap-3 shrink-0">
            <span class="hidden xl:inline text-sm text-midnight-500 whitespace-nowrap">{{ $settings['contact_phone'] ?? '+1 (647) 555-0199' }}</span>
            <x-button href="{{ route('gemstones') }}">Shop Gemstones</x-button>
        </div>

        <button class="ml-auto lg:hidden" data-menu-toggle aria-label="Toggle Menu">
            <svg class="h-6 w-6 text-midnight-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 6h18M3 12h18M3 18h18" />
            </svg>
        </button>
    </div>

    <div class="lg:hidden hidden" data-menu>
        <div class="px-4 pb-4 pt-2 space-y-2 bg-white border-t">
            <a href="{{ route('gemstones') }}" class="block py-1">Gemstones</a>
            <a href="{{ route('gemstones') }}#browse-by-type" class="block py-1">Browse by Gemstone Type</a>
            <a href="{{ route('gemstones') }}#browse-by-origin" class="block py-1">Browse by Origin</a>
            <a href="{{ route('education') }}" class="block py-1">Education</a>
            <a href="{{ route('about') }}" class="block py-1">About</a>
            <a href="{{ route('consultation') }}" class="block py-1">Traditional Consultation</a>
            <a href="{{ route('testimonials') }}" class="block py-1">Reviews</a>
            <a href="{{ route('contact') }}" class="block py-1">Contact</a>
            <a href="{{ route('gemstones') }}" class="block py-2 font-semibold text-emerald-700">Shop Gemstones</a>
        </div>
    </div>
</header>
