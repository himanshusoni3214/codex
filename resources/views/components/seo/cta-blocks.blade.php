@props([
    'heading' => 'Need help choosing the right gemstone?',
    'subtitle' => 'Book a consultation, request purchase details, or contact our team directly.',
])

@php
    $whatsAppRaw = (string) ($settings['whatsapp'] ?? $settings['contact_phone'] ?? '+1 (647) 555-0199');
    $whatsAppNumber = preg_replace('/[^0-9]/', '', $whatsAppRaw);
    $whatsAppLink = $whatsAppNumber ? 'https://wa.me/' . $whatsAppNumber : null;
@endphp

<section class="bg-midnight-900 text-white rounded-3xl p-6 md:p-8">
    <h2 class="font-display text-2xl">{{ $heading }}</h2>
    <p class="mt-2 text-white/80 text-sm md:text-base">{{ $subtitle }}</p>

    <div class="mt-6 flex flex-wrap gap-3">
        <x-button href="{{ route('consultation') }}" variant="light">Book Consultation</x-button>
        <x-button href="{{ route('order.create') }}" variant="outline" class="border-white text-white hover:bg-white/10">
            Purchase Request
        </x-button>
        @if($whatsAppLink)
            <a href="{{ $whatsAppLink }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold bg-white text-midnight-900 hover:bg-ivory transition">
                WhatsApp / Call
            </a>
        @endif
    </div>
</section>
