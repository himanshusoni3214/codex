@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<section class="bg-gemstone-glow">
    <div class="max-w-4xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Education</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Birthstones vs Traditional Beliefs</h1>
        <p class="text-lg text-midnight-600 mt-4">Birthstones are modern associations, while traditional gemstone beliefs are cultural and symbolic.</p>
    </div>
</section>

<section class="max-w-4xl mx-auto px-4 py-12 space-y-6 text-midnight-600">
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Modern Birthstones</h2>
        <p class="text-sm">Jewelry industry standards that associate gemstones with each month. Great for gifting and personal meaning.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Traditional Beliefs</h2>
        <p class="text-sm">Cultural practices that connect gemstones with symbolic meanings. These are belief-based and do not imply outcomes.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Our Position</h2>
        <p class="text-sm">We provide education and, if requested, a separate consultation for cultural traditions. No guarantees are offered.</p>
    </div>
</section>

<x-education.related-links />
@endsection
