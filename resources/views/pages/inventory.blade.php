@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Inventory</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Available Inventory</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">A curated inventory list with transparent pricing and documentation available upon request.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16">
    @if($categories->count())
        <div class="flex flex-wrap gap-3 text-sm text-midnight-600">
            @foreach($categories as $category)
                <span class="bg-white border border-platinum rounded-full px-4 py-2">{{ $category->category }}</span>
            @endforeach
        </div>
    @endif

    <div class="mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($inventoryItems as $item)
            <x-inventory-card :item="$item" />
        @endforeach
    </div>

    <div class="mt-10 bg-ivory rounded-3xl p-6 border border-platinum text-sm text-midnight-600">
        <p>All prices shown in CAD. GST/HST is calculated at checkout where applicable. Inventory availability may change as items are reserved or sold.</p>
    </div>
</section>
@endsection
