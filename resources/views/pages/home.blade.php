@extends('layouts.app')

@php
    $heroImage = 'https://cdn.pixabay.com/photo/2020/05/12/09/52/emerald-5162137_1280.jpg';
@endphp

@push('preload')
    <link rel="preload" as="image" href="{{ $heroImage }}" crossorigin>
@endpush

@section('content')
<x-hero
    title="Certified Natural Gemstones With Transparent Sourcing"
    subtitle="Natural Gem curates certified stones with full treatment disclosure, ethical sourcing standards, and Canada-first support."
    image="{{ $heroImage }}"
    imageAlt="Certified emerald gemstone"
    :cta="['label' => 'Shop Gemstones', 'url' => route('gemstones')]"
/>

<section class="max-w-6xl mx-auto px-4 py-10">
    <div class="grid md:grid-cols-4 gap-4 text-sm">
        <div class="bg-white rounded-2xl p-4 border border-platinum text-center">GIA / IGI Certification</div>
        <div class="bg-white rounded-2xl p-4 border border-platinum text-center">Transparent Treatment Disclosure</div>
        <div class="bg-white rounded-2xl p-4 border border-platinum text-center">Ethical Sourcing Standards</div>
        <div class="bg-white rounded-2xl p-4 border border-platinum text-center">Canada-first Client Care</div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-14">
    <div class="flex flex-col lg:flex-row justify-between gap-8">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Featured Gemstones</p>
            <h2 class="font-display text-3xl text-midnight-900 mt-3">Curated Natural Gemstones</h2>
        </div>
        <p class="text-midnight-600 max-w-xl">Each gemstone is selected for quality, verified with certification, and listed with full disclosure.</p>
    </div>
    <div class="mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($gemstones as $gemstone)
            <x-gemstone-card :gemstone="$gemstone" />
        @endforeach
    </div>
    <div class="mt-8">
        <x-button href="{{ route('gemstones') }}" variant="outline">View All Gemstones</x-button>
    </div>
</section>

<section class="bg-white">
    <div class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-10 items-center">
        <div class="space-y-4">
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Our Selection Process</p>
            <h2 class="font-display text-3xl text-midnight-900">How We Select Gemstones</h2>
            <p class="text-midnight-600">We evaluate certification, treatment history, cut quality, and provenance before a stone is listed. Transparency is non-negotiable.</p>
            <p class="text-sm text-midnight-500 mt-2">For clients who follow traditional belief systems, private cultural gemstone guidance is available by appointment.</p>
            <ol class="mt-4 space-y-3 text-sm text-midnight-600">
                <li>1. Certificate validation and report matching</li>
                <li>2. Treatment disclosure and ethical sourcing review</li>
                <li>3. Physical inspection for cut and clarity balance</li>
                <li>4. Documentation for care, storage, and long-term value</li>
            </ol>
            <x-button href="{{ route('education.certification') }}" variant="outline">Learn About Certification</x-button>
        </div>
        <div class="bg-ivory rounded-3xl p-8 shadow-lux border border-platinum">
            <h3 class="font-display text-2xl text-midnight-900">Traditional Guidance (Optional)</h3>
            <p class="text-midnight-600 mt-3">We offer a private, belief-based consultation for clients who value cultural gemstone traditions. This service is separate from purchases and does not imply outcomes or guarantees.</p>
            <div class="mt-6 flex flex-wrap gap-4">
                <x-button href="{{ route('consultation') }}">Learn About Consultation</x-button>
                <x-button href="{{ route('disclaimer') }}" variant="outline">Read Our Disclaimer</x-button>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16">
    <div class="grid lg:grid-cols-3 gap-6">
        <div class="bg-midnight-900 text-white rounded-3xl p-8">
            <p class="text-sm uppercase tracking-[0.35em] text-gold-200">Education Hub</p>
            <h3 class="font-display text-2xl mt-3">Buy With Confidence</h3>
            <p class="text-white/70 mt-3">Explore guides on certification, treatments, and how to shop responsibly in Canada.</p>
            <x-button href="{{ route('education') }}" variant="light" class="mt-4">Explore Education</x-button>
        </div>
        <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
            <h4 class="font-semibold text-midnight-900">Fine Jewelry Services</h4>
            <p class="text-sm text-midnight-600 mt-2">Custom settings, heirloom redesign, and matching stones upon request.</p>
            <x-button href="{{ route('contact') }}" variant="outline" class="mt-4">Request a Quote</x-button>
        </div>
        <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
            <h4 class="font-semibold text-midnight-900">Canada-wide Delivery</h4>
            <p class="text-sm text-midnight-600 mt-2">Insured shipping and secure packaging across Canada with tracking.</p>
            <x-button href="{{ route('order.create') }}" class="mt-4">Purchase Request</x-button>
        </div>
    </div>
</section>

<section class="bg-ivory">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="flex flex-col lg:flex-row justify-between gap-10">
            <div class="lg:w-1/3">
                <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Client Reviews</p>
                <h2 class="font-display text-3xl text-midnight-900 mt-3">Trusted By Clients Across Canada</h2>
                <p class="text-midnight-600 mt-3">Our clients value the clarity of our documentation, honesty, and service.</p>
            </div>
            <div class="lg:w-2/3">
                <x-testimonial-slider :testimonials="$testimonials" />
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-12">
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Compliance & Disclaimer</h3>
        <p class="text-midnight-600 mt-2">Natural Gem provides certified gemstones and educational resources. Any cultural or traditional gemstone symbolism is offered for personal interest only and does not imply medical, legal, financial, or personal outcomes.</p>
        <p class="mt-3 text-midnight-500 text-sm">No guarantees or outcomes are implied. Always consult licensed professionals for medical, legal, or financial matters.</p>
    </div>
</section>
@endsection
