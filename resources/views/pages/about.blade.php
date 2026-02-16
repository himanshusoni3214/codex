@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">About Natural Gem Store</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Canada-first Gemstone Specialists</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Natural Gem Store is built on transparency, certification, and ethical sourcing. We focus on natural gemstones and fine jewelry with clear documentation and honest guidance.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-10 items-center">
    <div class="space-y-4">
        <h2 class="font-display text-3xl text-midnight-900">Our Commitment</h2>
        <p class="text-midnight-600">Every gemstone is reviewed for certification, treatment history, and provenance. We believe trust is built through clarity, not promises.</p>
        <p class="text-midnight-600">Clients receive documentation, care guidance, and transparent pricing in CAD.</p>
    </div>
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">What Sets Us Apart</h3>
        <ul class="mt-4 space-y-3 text-sm text-midnight-600">
            <li>Certified gemstones with GIA or IGI documentation.</li>
            <li>Full treatment disclosure with every listing.</li>
            <li>Ethical sourcing standards and Canadian support.</li>
            <li>Education-led guidance without outcome claims.</li>
        </ul>
    </div>
</section>

<section class="bg-ivory">
    <div class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Mission</p>
            <h3 class="font-display text-2xl text-midnight-900 mt-3">Raise Trust</h3>
            <p class="text-midnight-600 mt-2">Make certified gemstones accessible with transparent education.</p>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Vision</p>
            <h3 class="font-display text-2xl text-midnight-900 mt-3">Global Standard</h3>
            <p class="text-midnight-600 mt-2">Set a Canada-first standard for ethical sourcing and disclosure.</p>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Values</p>
            <h3 class="font-display text-2xl text-midnight-900 mt-3">Clarity & Care</h3>
            <p class="text-midnight-600 mt-2">Provide honest guidance, accurate documentation, and supportive service.</p>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16">
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Need Help Selecting a Gemstone?</h3>
        <p class="text-midnight-600 mt-2">We can recommend options based on budget, certification, and design preferences.</p>
        <div class="mt-4 flex flex-wrap gap-4">
            <x-button href="{{ route('gemstones') }}">Shop Gemstones</x-button>
            <x-button href="{{ route('contact') }}" variant="outline">Contact Us</x-button>
        </div>
    </div>
</section>
@endsection
