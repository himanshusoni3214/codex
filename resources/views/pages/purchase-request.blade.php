@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Purchase Request</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Reserve A Certified Gemstone</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Submit a purchase request and we will confirm availability, pricing in CAD, and applicable taxes.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-3 gap-10">
    <div class="lg:col-span-2 bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Request Form</h2>
        <form method="POST" action="{{ route('order.store') }}" class="mt-6 space-y-4">
            @csrf
            <div class="grid md:grid-cols-2 gap-4">
                <x-form.input label="Full Name" name="name" placeholder="Your name" />
                <x-form.input label="Email" name="email" type="email" placeholder="you@example.com" />
            </div>
            @php
                $gemstoneOptions = ['' => 'Select a gemstone'] + $gemstones->pluck('title', 'id')->toArray();
            @endphp
            <div class="grid md:grid-cols-2 gap-4">
                <x-form.input label="Phone" name="phone" placeholder="+1" />
                <x-form.select
                    label="Select Gemstone"
                    name="product_id"
                    :options="$gemstoneOptions"
                />
            </div>
            <div class="grid md:grid-cols-2 gap-4">
                <x-form.input label="Preferred Date" name="preferred_date" type="date" />
                <x-form.input label="Preferred Time" name="preferred_time" placeholder="10:00 AM" />
            </div>
            <x-form.input label="Location" name="location" placeholder="City / Province" />
            <x-form.textarea label="Notes" name="message" rows="5" placeholder="Share setting preferences or certification questions" />

            <div class="flex items-center gap-3 flex-wrap">
                <x-button type="submit">Submit Request</x-button>
                @if(session('status'))
                    <span class="text-sm text-emerald-700">{{ session('status') }}</span>
                @endif
                <span class="text-xs text-midnight-500">No guarantees or outcomes are implied.</span>
            </div>
        </form>
    </div>

    <aside class="space-y-6">
        <div class="bg-ivory rounded-3xl p-6 border border-platinum">
            <h3 class="font-display text-xl text-midnight-900">What Happens Next?</h3>
            <ul class="mt-4 space-y-3 text-sm text-midnight-600">
                <li>We confirm gemstone availability and certification.</li>
                <li>Pricing in CAD is shared with tax details.</li>
                <li>Secure payment and insured delivery options follow.</li>
            </ul>
        </div>
        <div class="bg-ivory rounded-3xl p-6 border border-platinum text-sm text-midnight-600">
            <p>{{ $settings['tax_note'] ?? 'GST/HST is calculated based on your province.' }}</p>
            <p class="mt-2">No guarantees or outcomes are implied.</p>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
            <h3 class="font-display text-xl text-midnight-900">Need Immediate Help?</h3>
            <p class="text-sm text-midnight-600 mt-2">Speak with a gemstone specialist for urgent requests.</p>
            <p class="mt-3 text-sm text-midnight-600"><strong>Phone:</strong> {{ $settings['contact_phone'] ?? '+1 (647) 555-0199' }}</p>
            <x-button href="{{ route('contact') }}" variant="outline" class="mt-4">Contact Us</x-button>
        </div>
    </aside>
</section>
@endsection
