@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">FAQ</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Frequently Asked Questions</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Answers to common questions about certification, treatments, and buying gemstones in Canada.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 space-y-6">
    @foreach([
        ['Do you provide certification?', 'Yes. We provide GIA or IGI reports when available and disclose report numbers for verification.'],
        ['Are treatments disclosed?', 'Yes. Any known treatments are disclosed in each listing and reflected in documentation.'],
        ['Is pricing in CAD?', 'All pricing is listed in CAD, with GST/HST calculated based on your province.'],
        ['Do you offer consultations?', 'We offer a separate, belief-based consultation by appointment. It is optional and does not imply outcomes.'],
        ['Can I request a custom stone?', 'Yes. Contact our team for bespoke sourcing and custom jewelry services.'],
    ] as $faq)
        <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
            <h3 class="font-semibold text-midnight-900">{{ $faq[0] }}</h3>
            <p class="text-sm text-midnight-600 mt-2">{{ $faq[1] }}</p>
        </div>
    @endforeach
</section>
@endsection
