@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

@php
    $cleanCategories = collect($categories ?? [])
        ->map(fn ($category) => trim((string) ($category->category ?? '')))
        ->filter()
        ->unique()
        ->values();
@endphp

<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Inventory Shop</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Available Gemstone Inventory</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Curated inventory with transparent pricing, per-carat rates, and quantity visibility. Documentation and disclosure are available on request.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16">
    @if($cleanCategories->isNotEmpty())
        <div class="flex flex-wrap gap-3 text-sm text-midnight-600">
            @foreach($cleanCategories as $category)
                <span class="bg-white border border-platinum rounded-full px-4 py-2">{{ $category }}</span>
            @endforeach
        </div>
    @endif

    <div class="{{ $cleanCategories->isNotEmpty() ? 'mt-8' : 'mt-0' }} grid md:grid-cols-2 gap-6 items-start">
        <div id="browse-by-type" class="bg-white rounded-3xl p-6 border border-platinum shadow-lux scroll-mt-28 h-auto">
            <h2 class="font-display text-2xl text-midnight-900">Browse by Gemstone Type</h2>
            <div class="mt-4 flex flex-wrap gap-2 text-sm">
                @foreach($gemstoneTypes as $type)
                    <a href="{{ route('gemstones.show', ['slug' => $type->slug]) }}" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-400">
                        {{ $type->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <div id="browse-by-origin" class="bg-white rounded-3xl p-6 border border-platinum shadow-lux scroll-mt-28 h-auto">
            <h2 class="font-display text-2xl text-midnight-900">Browse by Origin</h2>
            <div class="mt-4 space-y-4 text-sm">
                @forelse($originGroups as $group)
                    <div>
                        <p class="text-xs uppercase tracking-[0.2em] text-midnight-500">{{ $group->type->name }}</p>
                        <div class="mt-2 flex flex-wrap gap-2">
                            @foreach($group->origins as $origin)
                                <a href="{{ route('gemstones.silo.origin', ['type' => $group->type->slug, 'origin' => $origin->slug]) }}" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-400">
                                    {{ $origin->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="flex flex-wrap gap-2">
                        @foreach($origins as $origin)
                            @if(!empty($origin->primary_type_slug))
                                <a href="{{ route('gemstones.silo.origin', ['type' => $origin->primary_type_slug, 'origin' => $origin->slug]) }}" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-400">
                                    {{ $origin->name }}
                                </a>
                            @else
                                <span class="bg-ivory border border-platinum rounded-full px-4 py-2">{{ $origin->name }}</span>
                            @endif
                        @endforeach
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="mt-10">
        <x-gemstone.product-grid :gemstones="$gemstones" />
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
