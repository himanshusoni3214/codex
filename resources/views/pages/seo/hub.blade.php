@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    :eyebrow="$hubEyebrow ?? 'Gemstone Library'"
    :title="$hubTitle ?? (optional($page)->hero_title ?? optional($page)->title ?? 'Gemstone Hub')"
    :subtitle="$hubSubtitle ?? (optional($page)->hero_subtitle ?? optional($page)->excerpt ?? '')"
/>

<section class="max-w-6xl mx-auto px-4 py-12 space-y-6">
    @if(!empty(optional($page)->content))
        <x-seo.section :title="optional($page)->title" :content="optional($page)->content" />
    @endif

    <x-seo.trust-badges />

    <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h2 class="font-display text-2xl text-midnight-900">Explore Pages</h2>
        <p class="text-sm text-midnight-600 mt-2">Browse topic pages curated for Canadian gemstone buyers.</p>

        <div class="mt-5 grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($items as $item)
                <article class="border border-platinum rounded-2xl p-4 bg-ivory">
                    <h3 class="font-display text-xl text-midnight-900">{{ $item->hero_title ?: $item->title }}</h3>
                    <p class="text-sm text-midnight-600 mt-2">{{ $item->excerpt ?: 'Educational guidance with disclosure-first buying context.' }}</p>
                    <div class="mt-4">
                        <x-button href="{{ $item->url }}" variant="outline">Read Guide</x-button>
                    </div>
                </article>
            @empty
                <div class="text-sm text-midnight-600">Pages will appear here after publishing.</div>
            @endforelse
        </div>
    </section>

    @if(($relatedTypes ?? collect())->isNotEmpty())
        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-2xl text-midnight-900">Browse Certified Gemstones</h2>
            <div class="mt-4 flex flex-wrap gap-2 text-sm">
                @foreach($relatedTypes as $type)
                    <a href="{{ route('gemstones.show', ['slug' => $type->slug]) }}" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-500">
                        {{ $type->name }}
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <x-seo.cta-blocks
        :heading="$ctaHeading ?? 'Book an appointment with Natural Gem Store'"
        :subtitle="$ctaSubtitle ?? 'Consultation and purchase requests are available across Toronto and the GTA.'"
    />
</section>
@endsection
