@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Inventory Shop</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Available Gemstone Inventory</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Curated inventory with transparent pricing, per-carat rates, and quantity visibility. Documentation and disclosure are available on request.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16">
    <div class="flex flex-wrap gap-3 text-sm text-midnight-600">
        @foreach($categories as $category)
            <span class="bg-white border border-platinum rounded-full px-4 py-2">{{ $category->category }}</span>
        @endforeach
    </div>

    <div class="mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($gemstones as $gemstone)
            <x-gemstone-card :gemstone="$gemstone" />
        @endforeach
    </div>

    <div class="mt-10 bg-ivory rounded-3xl p-6 border border-platinum text-sm text-midnight-600">
        <p>All prices shown in CAD. {{ $settings['tax_note'] ?? 'GST/HST is calculated at checkout based on your province.' }} Certificates and treatment disclosures are provided with every gemstone.</p>
    </div>

    <div class="mt-8 text-sm text-midnight-600">
        <a href="{{ route('education.certification') }}" class="underline">
            Learn how gemstone certification protects buyers →
        </a>
    </div>
</section>
@endsection
