<footer class="bg-midnight-900 text-white">
    <div class="max-w-6xl mx-auto px-4 py-12 grid md:grid-cols-4 gap-8">
        <div>
            <div class="flex items-center gap-3">
                <img src="{{ $settings['logo_path'] ?? '/images/natural-gem-logo.svg' }}" alt="Natural Gem Store" class="h-10 w-10">
                <div>
                    <p class="font-display text-lg">{{ $settings['site_name'] ?? 'Natural Gem Store' }}</p>
                    <p class="text-xs uppercase tracking-[0.28em] text-gold-300">Certified Natural Gemstones</p>
                </div>
            </div>
            <p class="mt-4 text-sm text-white/70">Canada-first gemstone specialists focused on transparency, certification, and ethical sourcing.</p>
            <p class="mt-4 text-xs text-white/60">No guarantees or outcomes are implied for any cultural or belief-based guidance.</p>
        </div>

        <div>
            <h4 class="font-semibold text-gold-200 mb-3">Explore</h4>
            <ul class="space-y-2 text-sm text-white/80">
                <li><a href="{{ route('gemstones') }}" class="hover:text-white">Gemstones</a></li>
                <li><a href="{{ route('astrology.index') }}" class="hover:text-white">Astrology Stones</a></li>
                <li><a href="{{ route('certification.index') }}" class="hover:text-white">Certification Library</a></li>
                <li><a href="{{ route('engagement.index') }}" class="hover:text-white">Engagement Rings</a></li>
                <li><a href="{{ route('education') }}" class="hover:text-white">Education Hub</a></li>
                <li><a href="{{ route('blog.index') }}" class="hover:text-white">Blog</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-white">About</a></li>
                <li><a href="{{ route('consultation') }}" class="hover:text-white">Traditional Consultation</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold text-gold-200 mb-3">Featured Gemstones</h4>
            <ul class="space-y-2 text-sm text-white/80">
                @foreach($navGemstones as $gemstone)
                    <li><a href="{{ $gemstone->detailPath() }}" class="hover:text-white">{{ $gemstone->title }}</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            <h4 class="font-semibold text-gold-200 mb-3">Contact</h4>
            <p class="text-sm text-white/80">{{ $settings['contact_address'] ?? 'Toronto, Ontario, Canada' }}</p>
            <p class="text-sm text-white/80 mt-2">{{ $settings['contact_phone'] ?? '+1 (647) 555-0199' }}</p>
            <p class="text-sm text-white/80">{{ $settings['contact_email'] ?? 'hello@naturalgem.com' }}</p>
            <div class="mt-4">
                <x-button href="{{ route('contact') }}" variant="light">Request Assistance</x-button>
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-6xl mx-auto px-4 py-4 text-xs text-white/60 flex flex-col md:flex-row justify-between gap-2">
            <span>&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Natural Gem Store' }}. All rights reserved.</span>
            <span>GST/HST applied where applicable. {{ $settings['tax_note'] ?? '' }}</span>
        </div>
        <div class="max-w-6xl mx-auto px-4 pb-6 text-xs text-white/50">
            <a href="{{ route('terms') }}" class="hover:text-white">Terms</a> ·
            <a href="{{ route('privacy') }}" class="hover:text-white">Privacy</a> ·
            <a href="{{ route('refunds') }}" class="hover:text-white">Refunds</a> ·
            <a href="{{ route('disclaimer') }}" class="hover:text-white">Disclaimer</a>
        </div>
    </div>
</footer>
