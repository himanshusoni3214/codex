@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Gemstone Detail</p>
            <h1 class="font-display text-4xl text-midnight-900 mt-3">{{ $gemstone->title }}</h1>
            <p class="text-lg text-midnight-600 mt-4">{{ $gemstone->short_description }}</p>
            <div class="mt-4 text-emerald-700 font-semibold text-lg">{{ $gemstone->display_price }}</div>
            <div class="mt-2 text-sm text-midnight-500">
                @if($gemstone->display_rate_per_carat)
                    CAD ${{ number_format($gemstone->display_rate_per_carat, 2) }}/ct
                @endif
                @if($gemstone->weight_per_piece)
                    <span class="ml-2">{{ number_format($gemstone->weight_per_piece, 2) }} ct/pc</span>
                @endif
                @if($gemstone->total_quantity)
                    <span class="ml-2">Qty: {{ $gemstone->total_quantity }}</span>
                @endif
            </div>
            <div class="mt-2 text-sm text-midnight-500">
                Available pieces: {{ $gemstone->available_quantity }}
            </div>
            <div class="mt-6 flex flex-wrap gap-4">
                <x-button href="{{ route('order.create') }}">Request Purchase</x-button>
                <x-button href="{{ route('gemstones') }}" variant="outline">Back to Gemstones</x-button>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-10 shadow-lux border border-platinum">
            <div class="bg-ivory rounded-2xl p-10">
                <x-responsive-image
                    :model="$gemstone"
                    :src="$gemstone->image"
                    :alt="$gemstone->title"
                    class="h-48 w-full max-w-[75%] mx-auto object-contain"
                    width="640"
                    height="480"
                />
            </div>
            <div class="mt-6 text-sm text-midnight-600">
                <p><strong>SKU:</strong> {{ $gemstone->sku ?? '—' }}</p>
                <p><strong>Certification:</strong> {{ $gemstone->certificate_lab ?? 'Available upon request' }} {{ $gemstone->certificate_number ? '(' . $gemstone->certificate_number . ')' : '' }}</p>
                <p><strong>Treatment Disclosure:</strong> {{ $gemstone->treatment ?? 'Available upon request' }}</p>
                <p><strong>Origin:</strong> {{ $gemstone->origin ?? 'Available upon request' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <h2 class="font-display text-3xl text-midnight-900">Gemstone Overview</h2>
        <p class="text-midnight-600 mt-4 leading-relaxed">{{ $gemstone->description }}</p>

        <div class="mt-6 grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-ivory rounded-2xl p-4">Carat: {{ $gemstone->carat ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Color: {{ $gemstone->color ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Clarity/Grade: {{ $gemstone->clarity ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Cut: {{ $gemstone->cut ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Shape: {{ $gemstone->shape ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Category: {{ $gemstone->gem_type ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Rate/ct: {{ $gemstone->display_rate_per_carat ? 'CAD $' . number_format($gemstone->display_rate_per_carat, 2) : '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Weight/pc: {{ $gemstone->weight_per_piece ? number_format($gemstone->weight_per_piece, 2) . ' ct' : '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Total Quantity: {{ $gemstone->total_quantity ?? '—' }}</div>
            <div class="bg-ivory rounded-2xl p-4">Total Weight: {{ $gemstone->total_weight ?? '—' }}</div>
        </div>

        <div class="mt-8 bg-ivory rounded-2xl p-4 text-sm text-midnight-600">
            <h3 class="font-semibold text-midnight-900 mb-2">Traditional & Cultural Context</h3>
            <p>In various cultural and historical traditions, this gemstone has been symbolically associated with certain qualities. These associations are belief-based and offered for educational purposes only.</p>
        </div>

        @if($gemstone->symbolic_meaning)
            <div class="mt-8">
                <h3 class="font-display text-2xl text-midnight-900">Cultural Symbolism (Optional)</h3>
                <p class="text-midnight-600 mt-3">{{ $gemstone->symbolic_meaning }}</p>
                <p class="text-xs text-midnight-500 mt-2">Symbolic meanings are cultural and belief-based. No guarantees or outcomes are implied.</p>
            </div>
        @endif
    </div>
    <aside class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-xl text-midnight-900">Certificate Viewer</h3>
        <p class="text-sm text-midnight-600 mt-2">Verify gemstone documentation and disclosure before purchase.</p>
        <div class="mt-4">
            @if($gemstone->certificate_url)
                <x-button href="{{ $gemstone->certificate_url }}" variant="outline">View Certificate</x-button>
            @else
                <p class="text-sm text-midnight-500">Certificate available upon request.</p>
            @endif
        </div>
        <div class="mt-6 text-sm text-midnight-600">
            <p><strong>Tax:</strong> {{ $settings['tax_note'] ?? 'GST/HST calculated at checkout based on province.' }}</p>
            <p class="mt-2"><strong>Disclaimer:</strong> No guarantees or outcomes are implied.</p>
        </div>

        <div class="mt-8 border-t border-platinum pt-6">
            <h4 class="font-display text-lg text-midnight-900">Reserve a Piece</h4>
            <p class="text-sm text-midnight-600 mt-2">Place a short hold on an available piece. We will confirm by email.</p>

            @if(session('reservation_success'))
                <p class="mt-3 text-sm text-emerald-700">{{ session('reservation_success') }}</p>
            @endif
            @if(session('reservation_error'))
                <p class="mt-3 text-sm text-red-600">{{ session('reservation_error') }}</p>
            @endif

            <form method="POST" action="{{ route('gemstones.reserve', $gemstone) }}" class="mt-4 space-y-3">
                @csrf
                <input type="text" name="name" placeholder="Full name" required class="w-full rounded-xl border border-platinum px-4 py-2 text-sm">
                <input type="email" name="email" placeholder="Email (optional)" class="w-full rounded-xl border border-platinum px-4 py-2 text-sm">
                <input type="text" name="phone" placeholder="Phone (optional)" class="w-full rounded-xl border border-platinum px-4 py-2 text-sm">
                <select name="hold_minutes" class="w-full rounded-xl border border-platinum px-4 py-2 text-sm">
                    <option value="60">Hold for 60 minutes</option>
                    <option value="120">Hold for 120 minutes</option>
                </select>
                <textarea name="notes" rows="3" placeholder="Notes (optional)" class="w-full rounded-xl border border-platinum px-4 py-2 text-sm"></textarea>
                <x-button type="submit">Reserve a Piece</x-button>
            </form>
        </div>
    </aside>
</section>
@endsection
