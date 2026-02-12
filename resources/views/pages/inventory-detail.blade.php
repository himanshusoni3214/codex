@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Inventory Detail</p>
            <h1 class="font-display text-4xl text-midnight-900 mt-3">{{ $item->title }}</h1>
            <p class="text-lg text-midnight-600 mt-4">{{ $item->short_description }}</p>
            <div class="mt-4 text-emerald-700 font-semibold text-lg">{{ $item->display_price }}</div>
            @if($item->sku)
                <div class="mt-2 text-sm text-midnight-500">SKU: {{ $item->sku }}</div>
            @endif
            <div class="mt-6 flex flex-wrap gap-4">
                <x-button href="{{ route('order.create') }}">Request Purchase</x-button>
                <x-button href="{{ route('inventory') }}" variant="outline">Back to Inventory</x-button>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-10 shadow-lux border border-platinum">
            <div class="bg-ivory rounded-2xl p-10">
                <img src="{{ $item->image ?? '/images/gemstones/emerald.svg' }}" alt="{{ $item->title }}" class="h-48 w-full max-w-[75%] mx-auto object-contain" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='/images/gemstones/emerald.svg';">
            </div>
            <div class="mt-6 text-sm text-midnight-600">
                <p><strong>Type:</strong> {{ $item->product_type ?? 'Inventory Item' }}</p>
                <p><strong>Category:</strong> {{ $item->gem_type ?? '—' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <h2 class="font-display text-3xl text-midnight-900">Item Overview</h2>
        <p class="text-midnight-600 mt-4 leading-relaxed">{{ $item->description }}</p>

        <div class="mt-6 grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-ivory rounded-2xl p-4">Rate per Carat: {{ $item->rate_per_carat ? 'CAD $' . number_format($item->rate_per_carat, 2) : '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Total Weight (ct): {{ $item->total_weight ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Total Quantity: {{ $item->total_quantity ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Weight per Piece (ct): {{ $item->weight_per_piece ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Origin: {{ $item->origin ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Treatment: {{ $item->treatment ?? '—' }}</div>
        </div>

        @if($item->notes)
            <div class="mt-8 bg-ivory rounded-2xl p-4 text-sm text-midnight-600">
                <h3 class="font-semibold text-midnight-900 mb-2">Notes</h3>
                <p>{{ $item->notes }}</p>
            </div>
        @endif
    </div>
    <aside class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-xl text-midnight-900">Availability & Disclosure</h3>
        <p class="text-sm text-midnight-600 mt-2">Inventory availability may change as items are reserved or sold. Documentation and disclosure are provided upon request.</p>
        <div class="mt-6 text-sm text-midnight-600">
            <p><strong>Tax:</strong> GST/HST calculated at checkout based on province.</p>
            <p class="mt-2"><strong>Disclaimer:</strong> No guarantees or outcomes are implied.</p>
        </div>
    </aside>
</section>
@endsection
