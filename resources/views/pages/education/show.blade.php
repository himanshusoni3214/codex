@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    eyebrow="Education"
    :title="$page->hero_title ?: $page->title"
    :subtitle="$page->hero_subtitle ?: ($page->excerpt ?: 'Practical gemstone education for informed Canadian buyers.')"
/>

<section class="max-w-4xl mx-auto px-4 py-12 space-y-6">
    <x-seo.section
        :title="$page->title"
        :content="$page->content ?: 'Content will be available soon.'"
    />

    <x-seo.faq :items="$page->faq_items ?? []" />

    @if(!empty($page->related_links))
        <section class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
            <h2 class="font-display text-2xl text-midnight-900">Related Links</h2>
            <div class="mt-4 space-y-2 text-sm">
                @foreach($page->related_links as $link)
                    <a class="block underline text-midnight-600 hover:text-emerald-700" href="{{ $link['url'] ?? '#' }}">
                        {{ $link['label'] ?? 'Related article' }}
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    @if(($relatedGemstones ?? collect())->isNotEmpty())
        <section class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
            <h2 class="font-display text-2xl text-midnight-900">Related Gemstones</h2>
            <div class="mt-4 flex flex-wrap gap-2 text-sm">
                @foreach($relatedGemstones as $type)
                    <a href="{{ route('gemstones.show', ['slug' => $type->slug]) }}" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-400">
                        {{ $type->name }}
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    @if(($relatedGuides ?? collect())->isNotEmpty())
        <section class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
            <h2 class="font-display text-2xl text-midnight-900">Related Guides</h2>
            <div class="mt-4 grid md:grid-cols-2 gap-4 text-sm">
                @foreach($relatedGuides as $guide)
                    <a href="{{ route('education.show', $guide->slug) }}" class="rounded-2xl border border-platinum p-4 hover:border-emerald-400">
                        <p class="font-semibold text-midnight-900">{{ $guide->title }}</p>
                        <p class="mt-1 text-midnight-600">{{ $guide->excerpt }}</p>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <section class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Explore More</h2>
        <div class="mt-4 space-y-2 text-sm">
            <a class="block underline text-midnight-600 hover:text-emerald-700" href="{{ route('certification.index') }}">Certification Library</a>
            <a class="block underline text-midnight-600 hover:text-emerald-700" href="{{ route('astrology.index') }}">Astrology Stone Guides</a>
            <a class="block underline text-midnight-600 hover:text-emerald-700" href="{{ route('engagement.index') }}">Colored Engagement Rings</a>
        </div>
    </section>
</section>
@endsection
