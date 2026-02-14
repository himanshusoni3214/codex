@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    eyebrow="Gemstone Guide"
    :title="$origin ? 'Buy ' . $type->name . ' from ' . $origin->name . ' in Canada' : 'Buy ' . $type->name . ' in Canada'"
    :subtitle="$origin?->hero_subtitle ?? $type->hero_subtitle ?? 'Certified inventory with CAD pricing, treatment disclosure, and report-first transparency.'"
/>

<section class="max-w-6xl mx-auto px-4 py-12 space-y-6">
    <x-seo.section
        title="Overview"
        :content="$introContent ?: 'Explore this gemstone category with certification-first context and Canadian buying guidance.'"
    />
    <x-seo.section
        title="History & Context"
        :content="$historyContent ?: 'This page provides educational context, sourcing perspective, and quality guidance for Canadian gemstone buyers.'"
    />
    <x-seo.section
        title="Canadian Buying Guide"
        :content="$buyingGuideContent ?: 'Expect CAD pricing, GST/HST handling by shipping province, and transparent report/disclosure documentation before purchase.'"
    />
    <x-seo.section
        title="Certification & Documentation"
        :content="$certificationContent ?: 'Certificates from recognized labs help verify identity and quality characteristics. Report links are provided whenever available.'"
    />
    <x-seo.section
        title="Treatment Disclosure"
        :content="$treatmentContent ?: 'Treatment information is disclosed for each listing where known. This information is provided for informed buying decisions.'"
    />
    <x-seo.faq :items="$faqItems" />
</section>

<section class="max-w-6xl mx-auto px-4 pb-16">
    <div class="flex items-end justify-between mb-6">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Filtered Inventory</p>
            <h2 class="font-display text-3xl text-midnight-900 mt-2">
                {{ $origin ? $type->name . ' from ' . $origin->name : $type->name }} Stones
            </h2>
        </div>
        <a href="{{ route('education') }}" class="text-sm underline text-midnight-600">See education hub</a>
    </div>

    <x-gemstone.product-grid :gemstones="$gemstones" />

    @if($showThinContentWarning ?? false)
        <div class="mt-6 bg-ivory rounded-2xl border border-platinum p-4 text-sm text-midnight-600">
            Inventory on this page is currently limited. We continue updating listings and disclosures as new certified pieces become available.
        </div>
    @endif

    @if(($relatedEducation ?? collect())->isNotEmpty())
        <div class="mt-10 bg-ivory rounded-3xl p-6 border border-platinum">
            <h3 class="font-display text-2xl text-midnight-900">Related Education</h3>
            <div class="mt-4 grid md:grid-cols-3 gap-4 text-sm">
                @foreach($relatedEducation as $educationPage)
                    <a href="{{ route('education.show', $educationPage->slug) }}" class="bg-white rounded-2xl p-4 border border-platinum hover:border-emerald-400">
                        <p class="font-semibold text-midnight-900">{{ $educationPage->title }}</p>
                        <p class="text-midnight-600 mt-1">{{ $educationPage->excerpt }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection
