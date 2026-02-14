@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">FAQ</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Frequently Asked Questions</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Answers to common questions about certification, treatments, and buying gemstones in Canada.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 space-y-6">
    @foreach($faqItems ?? [] as $faq)
        <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
            <h3 class="font-semibold text-midnight-900">{{ $faq['question'] }}</h3>
            <p class="text-sm text-midnight-600 mt-2">{{ $faq['answer'] }}</p>
        </div>
    @endforeach
</section>
@endsection
