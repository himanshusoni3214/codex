@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Privacy Policy</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Your Privacy Matters</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">We protect the information you share with us and use it only to provide services.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 space-y-8">
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum space-y-4">
        <h2 class="font-display text-2xl text-midnight-900">Information We Collect</h2>
        <p class="text-midnight-600">We collect information you provide through contact forms, purchase requests, and consultations, such as name, email, phone, and preferences.</p>
    </div>

    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum space-y-4">
        <h2 class="font-display text-2xl text-midnight-900">How We Use Information</h2>
        <p class="text-midnight-600">Your information is used to respond to requests, confirm availability, and deliver services. We do not sell your data.</p>
    </div>

    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum space-y-4">
        <h2 class="font-display text-2xl text-midnight-900">Data Protection</h2>
        <p class="text-midnight-600">We store data securely and limit access to authorized staff only.</p>
    </div>

    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum space-y-4">
        <h2 class="font-display text-2xl text-midnight-900">Contact</h2>
        <p class="text-midnight-600">For privacy questions, email us at {{ $settings['contact_email'] ?? 'hello@naturalgem.com' }}.</p>
    </div>
</section>
@endsection
