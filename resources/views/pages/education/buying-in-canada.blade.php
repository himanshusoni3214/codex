@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<section class="bg-gemstone-glow">
    <div class="max-w-4xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Education</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Buying Gemstones In Canada</h1>
        <p class="text-lg text-midnight-600 mt-4">Key considerations for pricing, taxes, and verifying authenticity in Canada.</p>
    </div>
</section>

<section class="max-w-4xl mx-auto px-4 py-12 space-y-6 text-midnight-600">
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Certification First</h2>
        <p class="text-sm">Always request a GIA or IGI report for higher-value stones and verify the report number.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Understand GST/HST</h2>
        <p class="text-sm">Taxes vary by province. We provide clear CAD pricing and tax estimates before purchase.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Ask About Treatments</h2>
        <p class="text-sm">Treatment disclosure affects value. We disclose all treatments we are aware of in the listing.</p>
    </div>
</section>

<x-education.related-links />
@endsection
