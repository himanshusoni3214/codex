<header class="sticky top-0 z-40 border-b border-platinum bg-white/95 backdrop-blur">
    <div class="mx-auto max-w-screen-2xl px-3 sm:px-4 lg:px-6">
        <div class="flex items-center justify-between gap-3 py-2">
            @php
                $markLogo = $settings['logo_path'] ?? '/images/natural-gem-store-mark.svg';
                $wordmarkLogo = $settings['logo_wordmark_path'] ?? '/images/natural-gem-store-logo.svg';
            @endphp
            <a href="{{ route('home') }}" class="flex min-w-0 items-center">
                <img src="{{ $markLogo }}" alt="Natural Gem Store" class="h-12 w-12 shrink-0 sm:hidden">
                <img src="{{ $wordmarkLogo }}" alt="Natural Gem Store" class="hidden h-14 w-auto sm:block md:h-16">
            </a>

            <nav class="hidden lg:flex flex-1 items-center justify-center gap-7 text-[15px] font-medium">
                <a href="{{ route('gemstones') }}" class="whitespace-nowrap transition-colors hover:text-emerald-700">Gemstones</a>
                <a href="{{ route('certification.index') }}" class="whitespace-nowrap transition-colors hover:text-emerald-700">Certification</a>
                <a href="{{ route('education') }}" class="whitespace-nowrap transition-colors hover:text-emerald-700">Education</a>
                <a href="{{ route('contact') }}" class="whitespace-nowrap transition-colors hover:text-emerald-700">Contact</a>
            </nav>

            <div class="hidden shrink-0 items-center gap-3 lg:flex">
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '+1 (647) 555-0199') }}"
                    class="hidden whitespace-nowrap text-sm text-midnight-500 transition-colors hover:text-midnight-700 xl:inline">
                    {{ $settings['contact_phone'] ?? '+1 (647) 555-0199' }}
                </a>
                <x-button href="{{ route('gemstones') }}" class="whitespace-nowrap px-4 py-2 text-sm">
                    Shop Gemstones
                </x-button>
            </div>

            <button class="ml-auto lg:hidden" data-menu-toggle aria-label="Toggle Menu">
                <svg class="h-6 w-6 text-midnight-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 6h18M3 12h18M3 18h18" />
                </svg>
            </button>
        </div>
    </div>

    <div class="hidden lg:hidden" data-menu>
        <div class="space-y-2 border-t border-platinum bg-white px-4 pb-4 pt-2">
            <a href="{{ route('gemstones') }}" class="block py-1">Gemstones</a>
            <a href="{{ route('certification.index') }}" class="block py-1">Certification</a>
            <a href="{{ route('education') }}" class="block py-1">Education</a>
            <a href="{{ route('contact') }}" class="block py-1">Contact</a>
            <a href="{{ route('consultation') }}" class="block py-1">Book Consultation</a>
            <a href="{{ route('order.create') }}" class="block py-1">Purchase Request</a>
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '+1 (647) 555-0199') }}" class="block py-1">
                {{ $settings['contact_phone'] ?? '+1 (647) 555-0199' }}
            </a>
            <a href="{{ route('gemstones') }}" class="block py-2 font-semibold text-emerald-700">Shop Gemstones</a>
        </div>
    </div>
</header>
