@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    eyebrow="Toronto"
    title="Toronto Gemstone Store"
    subtitle="Certified natural gemstones for Toronto and the GTA with CAD pricing, transparent disclosures, and report-first documentation."
/>

<section class="max-w-6xl mx-auto px-4 py-12 grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h2 class="font-display text-2xl text-midnight-900">Local Trust & Buying Confidence</h2>
        <p class="text-midnight-600 mt-3">Natural Gem Store serves Toronto clients with clear gemstone documentation, treatment disclosure, and province-based GST/HST handling. Product context is educational and no outcomes are implied.</p>
        <div class="mt-6 rounded-2xl border border-platinum bg-ivory p-4 text-sm text-midnight-600">
            <p><strong>Map Placeholder:</strong> Embed your verified Google Business map here.</p>
            <p class="mt-2">Address: {{ $settings['contact_address'] ?? 'Toronto, Ontario, Canada' }}</p>
            <p>Phone: {{ $settings['contact_phone'] ?? '+1 (647) 555-0199' }}</p>
            <p>Email: {{ $settings['contact_email'] ?? 'hello@naturalgem.com' }}</p>
            <p class="mt-2"><strong>Areas served:</strong> Toronto, GTA, and Ontario.</p>
        </div>
        <div class="mt-6 flex flex-wrap gap-3">
            <x-button href="{{ route('consultation') }}">Book Consultation</x-button>
            <x-button href="{{ route('order.create') }}" variant="outline">Purchase Request</x-button>
        </div>
    </div>
    <div class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h3 class="font-display text-xl text-midnight-900">Browse by Gemstone</h3>
        <div class="mt-4 space-y-2 text-sm">
            @foreach($types as $type)
                <a href="{{ route('gemstones.show', ['slug' => $type->slug]) }}" class="block underline text-midnight-600 hover:text-emerald-700">{{ $type->name }}</a>
            @endforeach
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 pb-16">
    <div class="grid lg:grid-cols-2 gap-6">
        <div class="bg-ivory rounded-3xl p-6 border border-platinum">
            <h3 class="font-display text-2xl text-midnight-900">Browse by Origin</h3>
            <div class="mt-4 grid md:grid-cols-2 gap-3 text-sm">
                @foreach($origins as $origin)
                    @if(!empty($origin->primary_type_slug))
                        <a href="{{ route('gemstones.silo.origin', ['type' => $origin->primary_type_slug, 'origin' => $origin->slug]) }}" class="bg-white border border-platinum rounded-full px-4 py-2 text-center hover:border-emerald-400">{{ $origin->name }}</a>
                    @else
                        <span class="bg-white border border-platinum rounded-full px-4 py-2 text-center">{{ $origin->name }}</span>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h3 class="font-display text-2xl text-midnight-900">Related Guides</h3>
            <div class="mt-4 space-y-2 text-sm">
                <a href="{{ route('education.buying-in-canada') }}" class="block underline text-midnight-600 hover:text-emerald-700">Buying Gemstones in Canada</a>
                <a href="{{ route('education.gia-vs-igi') }}" class="block underline text-midnight-600 hover:text-emerald-700">GIA vs IGI</a>
                <a href="{{ route('education.natural-vs-treated') }}" class="block underline text-midnight-600 hover:text-emerald-700">Natural vs Treated Gemstones</a>
            </div>
        </div>
    </div>
</section>
@endsection
