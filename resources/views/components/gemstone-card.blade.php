@props(['gemstone'])

<div class="bg-white rounded-3xl shadow-lux border border-platinum overflow-hidden flex flex-col">
    <div class="h-44 bg-ivory flex items-center justify-center p-8">
        <x-responsive-image
            :model="$gemstone"
            :src="$gemstone->image"
            :alt="$gemstone->title"
            class="max-h-24 max-w-[70%] object-contain"
            width="320"
            height="220"
        />
    </div>
    <div class="p-6 flex flex-col flex-1">
        <p class="text-xs uppercase tracking-[0.2em] text-midnight-500">{{ $gemstone->gem_type ?? $gemstone->category }}</p>
        <h3 class="font-display text-xl text-midnight-900 mt-2">{{ $gemstone->title }}</h3>
        <p class="text-sm text-midnight-600 mt-2 flex-1">{{ $gemstone->short_description }}</p>
        <div class="mt-3 text-sm text-emerald-700 font-semibold">{{ $gemstone->display_price }}</div>
        <div class="mt-2 text-xs text-midnight-500">
            @if($gemstone->display_rate_per_carat)
                CAD ${{ number_format($gemstone->display_rate_per_carat, 2) }}/ct
            @endif
            @if($gemstone->weight_per_piece)
                <span class="ml-2">{{ number_format($gemstone->weight_per_piece, 2) }} ct/pc</span>
            @endif
            <span class="ml-2">Available: {{ $gemstone->available_quantity }}</span>
        </div>
        <div class="mt-4">
            <x-button href="{{ route('gemstones.show', $gemstone) }}" variant="outline">View Details</x-button>
        </div>
    </div>
</div>
