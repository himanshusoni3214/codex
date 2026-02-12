@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">By Appointment</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Traditional Gemstone Consultation</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">A private, belief-based consultation for clients who wish to explore cultural gemstone traditions. This service is optional and separate from gemstone purchases.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-3 gap-10">
    <div class="lg:col-span-2 bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Consultation Request</h2>
        <p class="text-sm text-midnight-600 mt-2">We will confirm availability and provide scheduling details. No guarantees or outcomes are implied.</p>
        <p class="text-xs text-midnight-500 mt-1">This service does not replace medical, legal, or financial advice.</p>
        <form method="POST" action="{{ route('consultation.store') }}" class="mt-6 space-y-4">
            @csrf
            <div class="grid md:grid-cols-2 gap-4">
                <x-form.input label="Full Name" name="name" />
                <x-form.input label="Email" name="email" type="email" />
            </div>
            <div class="grid md:grid-cols-2 gap-4">
                <x-form.input label="Phone" name="phone" />
                <x-form.select label="Consultation Tier" name="consultation_tier" :options="['' => 'Select a tier', 'Essential' => 'Essential (CAD 120)', 'Professional' => 'Professional (CAD 240)', 'Comprehensive' => 'Comprehensive (CAD 420)']" />
            </div>
            <div class="grid md:grid-cols-3 gap-4">
                <x-form.input label="Birth Date" name="birth_date" type="date" />
                <x-form.input label="Birth Time" name="birth_time" placeholder="HH:MM" />
                <x-form.input label="Birth Place" name="birth_place" placeholder="City, Country" />
            </div>
            <x-form.input label="Focus Area (optional)" name="focus_area" placeholder="Career, wellbeing, etc." />
            <x-form.textarea label="Notes (optional)" name="notes" rows="4" placeholder="Share context or questions" />

            <div class="flex items-start gap-2 text-sm text-midnight-600">
                <input type="checkbox" name="consent" value="1" class="mt-1 h-4 w-4">
                <label>I understand this is a cultural, belief-based service and no outcomes are guaranteed.</label>
            </div>

            <div class="flex items-center gap-3 flex-wrap">
                <x-button type="submit">Submit Request</x-button>
                @if(session('status'))
                    <span class="text-sm text-emerald-700">{{ session('status') }}</span>
                @endif
            </div>
        </form>
    </div>

    <aside class="space-y-6">
        <div class="bg-ivory rounded-3xl p-6 border border-platinum">
            <h3 class="font-display text-xl text-midnight-900">What This Includes</h3>
            <ul class="mt-4 space-y-3 text-sm text-midnight-600">
                <li>Belief-based gemstone traditions and symbolism</li>
                <li>Private, confidential discussion</li>
                <li>Documentation for personal reference</li>
            </ul>
        </div>
        <div class="bg-ivory rounded-3xl p-6 border border-platinum">
            <h3 class="font-display text-xl text-midnight-900">What This Does Not Include</h3>
            <ul class="mt-4 space-y-3 text-sm text-midnight-600">
                <li>No medical, legal, or financial advice</li>
                <li>No guaranteed outcomes or promises</li>
                <li>No replacement for professional services</li>
            </ul>
        </div>
    </aside>
</section>
@endsection
