@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    eyebrow="GTA Service Area"
    :title="$page->hero_title ?: ($cityName . ' Gemstone Store')"
    :subtitle="$page->hero_subtitle ?: ($page->excerpt ?: 'Certified natural gemstones for ' . $cityName . ' with Toronto/GTA appointment support.')"
/>

<section class="max-w-6xl mx-auto px-4 py-12 grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h2 class="font-display text-2xl text-midnight-900">{{ $page->title }}</h2>
        <div class="prose prose-sm max-w-none mt-4 text-midnight-600 prose-headings:text-midnight-900 prose-headings:font-display">
            {!! $page->content !!}
        </div>

        <div class="mt-6 grid md:grid-cols-2 gap-3 text-sm">
            <div class="rounded-2xl border border-platinum bg-ivory p-4">
                <p class="font-semibold text-midnight-900">Certification-first</p>
                <p class="mt-1 text-midnight-600">Lab-backed documentation is reviewed before purchase confirmation.</p>
            </div>
            <div class="rounded-2xl border border-platinum bg-ivory p-4">
                <p class="font-semibold text-midnight-900">Disclosure-first</p>
                <p class="mt-1 text-midnight-600">Known treatments and report references are shared in writing.</p>
            </div>
        </div>

        <div class="mt-6 rounded-2xl border border-platinum bg-ivory p-4 text-sm text-midnight-600">
            <p><strong>Map section:</strong> Embed your verified map for {{ $cityName }} appointment support.</p>
            <p class="mt-2"><strong>Primary location:</strong> {{ $settings['contact_address'] ?? 'Toronto, Ontario, Canada' }}</p>
            <p><strong>Phone:</strong> {{ $settings['contact_phone'] ?? '+1 (647) 555-0199' }}</p>
            <p><strong>Email:</strong> {{ $settings['contact_email'] ?? 'hello@naturalgem.com' }}</p>
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h3 class="font-display text-xl text-midnight-900">Service Area Links</h3>
            <div class="mt-4 space-y-2 text-sm">
                <a href="{{ route('consultation') }}" class="block underline text-midnight-600 hover:text-emerald-700">Book Consultation</a>
                <a href="{{ route('order.create') }}" class="block underline text-midnight-600 hover:text-emerald-700">Purchase Request</a>
                <a href="{{ route('gemstones') }}" class="block underline text-midnight-600 hover:text-emerald-700">Browse Gemstone Inventory</a>
                <a href="{{ route('certification.index') }}" class="block underline text-midnight-600 hover:text-emerald-700">Certification Library</a>
                <a href="{{ route('astrology.index') }}" class="block underline text-midnight-600 hover:text-emerald-700">Astrology Stone Guides</a>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h3 class="font-display text-xl text-midnight-900">Testimonial Snippets</h3>
            <div class="mt-4 space-y-3 text-sm text-midnight-600">
                @foreach($testimonials as $item)
                    <blockquote class="border-l-2 border-emerald-600 pl-3">
                        “{{ $item['quote'] }}”
                        <cite class="block mt-1 text-xs text-midnight-500">— {{ $item['name'] }}</cite>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 pb-16 space-y-6">
    @if(!empty($page->faq_items))
        <x-seo.faq :items="$page->faq_items" title="{{ $cityName }} Gemstone Store FAQs" />
    @endif

    <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h2 class="font-display text-2xl text-midnight-900">Top Gemstone Categories</h2>
        <div class="mt-4 flex flex-wrap gap-2 text-sm">
            @foreach($types as $type)
                <a href="{{ route('gemstones.show', ['slug' => $type->slug]) }}" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-500">
                    {{ $type->name }}
                </a>
            @endforeach
        </div>
    </section>

    <x-seo.cta-blocks
        heading="Serving {{ $cityName }} and the GTA"
        subtitle="Consultation appointments and purchase support are available with transparent CAD pricing and disclosures."
    />
</section>
@endsection
