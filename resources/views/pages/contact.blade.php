@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Contact Us</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Speak With A Gemstone Specialist</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">We respond within one business day for product inquiries, certification questions, or bespoke requests.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-10">
    <div>
        <h2 class="font-display text-2xl text-midnight-900">Reach Us</h2>
        <div class="mt-4 space-y-3 text-sm text-midnight-600">
            <p><strong>Phone:</strong> {{ $settings['contact_phone'] ?? '+1 (647) 555-0199' }}</p>
            <p><strong>Email:</strong> {{ $settings['contact_email'] ?? 'hello@naturalgem.com' }}</p>
            <p><strong>Address:</strong> {{ $settings['contact_address'] ?? 'Toronto, Ontario, Canada' }}</p>
        </div>
        <div class="mt-8 bg-ivory rounded-3xl p-6 border border-platinum">
            <h3 class="font-display text-xl text-midnight-900">Operating Hours</h3>
            <p class="text-sm text-midnight-600 mt-2">Mon - Fri: 10:00 AM - 6:00 PM</p>
            <p class="text-sm text-midnight-600">Saturday: By appointment</p>
        </div>
    </div>
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Send A Message</h2>
        <p class="text-sm text-midnight-600 mt-2">Share your gemstone preferences or certification questions.</p>
        <div class="mt-6">
            <x-contact-form />
        </div>
    </div>
</section>
@endsection
