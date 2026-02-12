@props(['item'])

<div class="bg-white rounded-3xl shadow-lux border border-platinum overflow-hidden flex flex-col">
    <div class="h-44 bg-ivory flex items-center justify-center p-8">
        <img src="{{ $item->image ?? '/images/gemstones/emerald.svg' }}" alt="{{ $item->title }}" class="max-h-24 max-w-[70%] object-contain" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='/images/gemstones/emerald.svg';">
    </div>
    <div class="p-6 flex flex-col flex-1">
        <p class="text-xs uppercase tracking-[0.2em] text-midnight-500">
            {{ $item->gem_type ?? $item->product_type ?? 'Inventory Item' }}
        </p>
        <h3 class="font-display text-xl text-midnight-900 mt-2">{{ $item->title }}</h3>
        <p class="text-sm text-midnight-600 mt-2 flex-1">{{ $item->short_description }}</p>
        <div class="mt-3 text-sm text-emerald-700 font-semibold">{{ $item->display_price }}</div>
        <div class="mt-2 text-xs text-midnight-500">
            @if($item->rate_per_carat)
                CAD ${{ number_format($item->rate_per_carat, 2) }}/ct
            @endif
            @if($item->weight_per_piece)
                <span class="ml-2">{{ number_format($item->weight_per_piece, 2) }} ct/pc</span>
            @endif
            @if($item->total_quantity)
                <span class="ml-2">Qty: {{ $item->total_quantity }}</span>
            @endif
        </div>
        @if($item->sku)
            <div class="mt-2 text-xs text-midnight-500">SKU: {{ $item->sku }}</div>
        @endif
        <div class="mt-4">
            <x-button href="{{ route('inventory.show', $item) }}" variant="outline">View Details</x-button>
        </div>
    </div>
</div>
