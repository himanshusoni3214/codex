@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Education Hub</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Learn About Gemstones</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Clear, unbiased education to help you buy responsibly with confidence.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-6">
    <a href="{{ route('education.certification') }}" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Gemstone Certification Explained</h3>
        <p class="text-sm text-midnight-600 mt-2">What certification means and why it matters for value and transparency.</p>
    </a>
    <a href="{{ route('education.gia-vs-igi') }}" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">GIA vs IGI</h3>
        <p class="text-sm text-midnight-600 mt-2">Understand the differences between leading gemological labs.</p>
    </a>
    <a href="{{ route('education.natural-vs-treated') }}" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Natural vs Treated</h3>
        <p class="text-sm text-midnight-600 mt-2">How treatments are disclosed and why transparency is critical.</p>
    </a>
    <a href="{{ route('education.birthstones-vs-astrology') }}" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Birthstones vs Traditional Beliefs</h3>
        <p class="text-sm text-midnight-600 mt-2">Distinguish modern birthstones from cultural gemstone traditions.</p>
    </a>
    <a href="{{ route('education.buying-in-canada') }}" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Buying Gemstones In Canada</h3>
        <p class="text-sm text-midnight-600 mt-2">Tips on pricing, taxes, and verifying authenticity in Canada.</p>
    </a>

    @foreach($educationPages as $educationPage)
        @if(!in_array($educationPage->slug, ['education', 'certification', 'gia-vs-igi', 'natural-vs-treated', 'birthstones-vs-astrology', 'buying-gemstones-canada']))
            <a href="{{ route('education.show', $educationPage->slug) }}" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
                <h3 class="font-display text-2xl text-midnight-900">{{ $educationPage->title }}</h3>
                <p class="text-sm text-midnight-600 mt-2">{{ $educationPage->excerpt ?: 'Editorial education content for responsible buyers.' }}</p>
            </a>
        @endif
    @endforeach
</section>
@endsection
