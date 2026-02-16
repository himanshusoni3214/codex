@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    :eyebrow="$sectionLabel ?? 'Guide'"
    :title="$page->hero_title ?: $page->title"
    :subtitle="$page->hero_subtitle ?: ($page->excerpt ?: '')"
/>

<section class="max-w-6xl mx-auto px-4 py-12 space-y-6">
    <x-seo.section :title="$page->title" :content="$page->content ?: '<p>Content will be available soon.</p>'" />

    <x-seo.trust-badges />

    @if(!empty($page->related_links))
        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-2xl text-midnight-900">Recommended Internal Links</h2>
            <div class="mt-4 grid md:grid-cols-2 gap-3 text-sm">
                @foreach($page->related_links as $link)
                    <a href="{{ $link['url'] ?? '#' }}" class="rounded-2xl border border-platinum bg-ivory px-4 py-3 hover:border-emerald-500">
                        {{ $link['label'] ?? 'Learn more' }}
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    @if(($relatedInventory ?? collect())->isNotEmpty())
        <section class="space-y-4">
            <h2 class="font-display text-3xl text-midnight-900">{{ $relatedInventoryTitle ?? 'Related Inventory' }}</h2>
            <x-gemstone.product-grid :gemstones="$relatedInventory" />
        </section>
    @endif

    <x-seo.faq :items="$page->faq_items ?? []" title="Frequently Asked Questions" />

    @if(($relatedGuides ?? collect())->isNotEmpty())
        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-2xl text-midnight-900">Related Guides</h2>
            <div class="mt-4 grid md:grid-cols-2 gap-3 text-sm">
                @foreach($relatedGuides as $guide)
                    @php
                        $guideUrl = match ($guide->section ?? null) {
                            'education' => route('education.show', $guide->slug),
                            'astrology' => route('astrology.show', $guide->slug),
                            'certification' => route('certification.show', $guide->slug),
                            'engagement' => route('engagement.show', $guide->slug),
                            default => '#',
                        };
                    @endphp
                    <a href="{{ $guideUrl }}" class="rounded-2xl border border-platinum bg-ivory px-4 py-3 hover:border-emerald-500">
                        {{ $guide->title }}
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <x-seo.cta-blocks
        :heading="$ctaHeading ?? 'Ready to continue?'"
        :subtitle="$ctaSubtitle ?? 'Book consultation or submit a purchase request with your preferred gemstone details.'"
    />
</section>
@endsection
