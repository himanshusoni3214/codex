@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<section class="bg-gemstone-glow">
    <div class="max-w-4xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Education</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Natural vs Treated Gemstones</h1>
        <p class="text-lg text-midnight-600 mt-4">Treatments can enhance color or clarity. Transparency matters more than the treatment itself.</p>
    </div>
</section>

<section class="max-w-4xl mx-auto px-4 py-12 space-y-6 text-midnight-600">
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Natural, Untreated</h2>
        <p class="text-sm">No known enhancements. Typically rare and priced accordingly.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Treated</h2>
        <p class="text-sm">Heat or other treatments are common in the trade. We always disclose treatment type and provide certification when available.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Buyer Guidance</h2>
        <p class="text-sm">Ask for the report, review the disclosure, and confirm pricing aligns with treatment status.</p>
    </div>
</section>

<x-education.related-links />
@endsection
