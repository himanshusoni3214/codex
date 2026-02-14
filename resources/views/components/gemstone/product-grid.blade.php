@props([
    'gemstones' => [],
    'emptyMessage' => 'No inventory currently available for this filter.',
])

@php
    $items = $gemstones instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator
        ? $gemstones->getCollection()
        : collect($gemstones);
@endphp

@if($items->isEmpty())
    <div class="bg-white rounded-3xl border border-platinum p-8 text-midnight-600">
        {{ $emptyMessage }}
    </div>
@else
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($items as $gemstone)
            <x-gemstone-card :gemstone="$gemstone" />
        @endforeach
    </div>

    @if($gemstones instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $gemstones->hasPages())
        <div class="mt-8">
            {{ $gemstones->onEachSide(1)->links() }}
        </div>
    @endif
@endif
