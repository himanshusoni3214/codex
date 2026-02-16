@extends('layouts.app')

@php
    $primaryType = $type ?? $gemstone->primary_gemstone_type;
    $primaryOrigin = $origin ?? $gemstone->primary_origin;
    $faqs = $faqs ?? ($faqItems ?? []);
    $typeSlug = $primaryType?->slug ?: (\Illuminate\Support\Str::slug($gemstone->gem_type ?? ''));
    $typeLabel = $primaryType?->name ?: ($gemstone->gem_type ?: 'Gemstone');

    $caratValue = $gemstone->carat ?? $gemstone->weight_per_piece ?? $gemstone->weight ?? null;
    $caratLabel = $caratValue ? number_format((float) $caratValue, 2) : null;
    $heroImage = $gemstone->image ?: '/images/gemstones/emerald.svg';
    $seoAlt = $caratLabel
        ? "{$caratLabel} Ct Natural {$typeLabel} - Certified Gemstone in Canada"
        : "Natural {$typeLabel} - Certified Gemstone in Canada";

    // Keep schema description aligned with the visible "Product Overview" section below.
    $typeLabelLower = \Illuminate\Support\Str::lower($typeLabel);
    $overviewParagraphs = [
        "This {$typeLabelLower} listing is structured for buyers who prioritize measurable gemstone quality before any stylistic preference. The listing records visible factors such as carat, color, cut style, clarity notes, and treatment disclosure in one place, so you can compare options on objective criteria. Rather than relying on broad claims, the page presents what is physically documented for this exact stone and what still requires direct lab verification. That approach keeps decision-making transparent for Canadian buyers evaluating premium gemstones online.",
        ($caratLabel ? "At {$caratLabel} ct," : 'For this item,') . " weight and rate-per-carat are shown alongside total CAD pricing to make valuation straightforward. Clarity and color are listed as practical buying references, while cut and shape help explain face-up appearance and setting suitability for rings, pendants, or custom commissions. If you are comparing multiple stones in the same budget range, this standardized format helps you assess value quickly without losing detail on certification or disclosure fields.",
        'Use cases vary by buyer intent: some clients purchase for fine jewelry projects, some for collector inventory, and others for culturally meaningful gifting. In each case, documentation-first purchasing reduces ambiguity. Where a certificate number or lab link is available, it is shown directly. Where details are pending, the listing states that clearly instead of implying certainty. This keeps product representation aligned with both compliance expectations and premium retail standards for gemstone commerce in Canada.',
        $gemstone->description ?: 'Each gemstone is independently reviewed for visual quality, disclosure status, and listing accuracy before publication.',
    ];
    $overviewPlainText = (string) \Illuminate\Support\Str::of(implode(' ', $overviewParagraphs))->squish();

    $productSchema = app(\App\SEO\Schema\ProductSchema::class)->build($gemstone, [
        'typeSlug' => $typeSlug ?: null,
        'category' => $typeLabel,
        'description' => $overviewPlainText,
        'url' => $canonical ?? null,
    ]);
@endphp

@push('preload')
    <link rel="preload" as="image" href="{{ $heroImage }}">
@endpush

@push('schema')
    @include('seo.schema.product-jsonld', ['schema' => $productSchema])
@endpush

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Gemstones', 'url' => route('gemstones')],
    ['label' => $gemstone->title, 'url' => url()->current()],
]" />

<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Certified Product Detail</p>
            <h1 class="font-display text-4xl text-midnight-900 mt-3">{{ $gemstone->title }}</h1>
            <p class="text-lg text-midnight-600 mt-4">{{ $gemstone->short_description }}</p>

            <div class="mt-4 text-emerald-700 font-semibold text-xl">{{ $gemstone->display_price }}</div>
            <div class="mt-2 text-sm text-midnight-500">
                @if($gemstone->display_rate_per_carat)
                    CAD ${{ number_format($gemstone->display_rate_per_carat, 2) }}/ct
                @endif
                @if($gemstone->weight_per_piece)
                    <span class="ml-2">{{ number_format($gemstone->weight_per_piece, 2) }} ct/pc</span>
                @endif
                @if($gemstone->available_quantity !== null)
                    <span class="ml-2">Available pieces: {{ $gemstone->available_quantity }}</span>
                @endif
            </div>

            <div class="mt-4 flex flex-wrap gap-2">
                <span class="text-xs rounded-full bg-white px-3 py-1 border border-platinum">Certified</span>
                <span class="text-xs rounded-full bg-white px-3 py-1 border border-platinum">Ethical Sourcing</span>
                <span class="text-xs rounded-full bg-white px-3 py-1 border border-platinum">Canada-first</span>
            </div>

            <p class="mt-4 text-sm text-midnight-600">
                @if($gemstone->available_quantity > 0)
                    Only {{ $gemstone->available_quantity }} piece{{ $gemstone->available_quantity > 1 ? 's' : '' }} currently available from this listing.
                @else
                    This listing is currently marked as unavailable. Contact us for restock timing.
                @endif
            </p>

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
                    :alt="$seoAlt"
                    class="h-56 w-full max-w-[75%] mx-auto object-contain"
                    width="640"
                    height="480"
                    loading="eager"
                />
            </div>
            <div class="mt-6 text-sm text-midnight-600 space-y-1">
                <p><strong>SKU:</strong> {{ $gemstone->sku ?? '—' }}</p>
                <p><strong>Gemstone Type:</strong> {{ $typeLabel }}</p>
                <p><strong>Origin:</strong> {{ $gemstone->origin ?? ($primaryOrigin?->name ?? 'Available upon request') }}</p>
                <p><strong>Certification:</strong> {{ $gemstone->certificate_lab ?? 'Available upon request' }} {{ $gemstone->certificate_number ? '(' . $gemstone->certificate_number . ')' : '' }}</p>
                <p><strong>Treatment Disclosure:</strong> {{ $gemstone->treatment ?? 'Available upon request' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-8">
        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-3xl text-midnight-900">Product Overview</h2>
            <div class="mt-4 space-y-4 text-midnight-600 leading-relaxed">
                @foreach($overviewParagraphs as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            <div class="mt-6 grid md:grid-cols-2 gap-4 text-sm">
                <div class="bg-ivory rounded-2xl p-4">Carat: {{ $gemstone->carat ?? '—' }}</div>
                <div class="bg-ivory rounded-2xl p-4">Color: {{ $gemstone->color ?? '—' }}</div>
                <div class="bg-ivory rounded-2xl p-4">Clarity/Grade: {{ $gemstone->clarity ?? '—' }}</div>
                <div class="bg-ivory rounded-2xl p-4">Cut: {{ $gemstone->cut ?? '—' }}</div>
                <div class="bg-ivory rounded-2xl p-4">Shape: {{ $gemstone->shape ?? '—' }}</div>
                <div class="bg-ivory rounded-2xl p-4">Rate/ct: {{ $gemstone->display_rate_per_carat ? 'CAD $' . number_format($gemstone->display_rate_per_carat, 2) : '—' }}</div>
                <div class="bg-ivory rounded-2xl p-4">Weight/pc: {{ $gemstone->weight_per_piece ? number_format($gemstone->weight_per_piece, 2) . ' ct' : '—' }}</div>
                <div class="bg-ivory rounded-2xl p-4">Total Quantity: {{ $gemstone->total_quantity ?? '—' }}</div>
            </div>
        </section>

        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-3xl text-midnight-900">Certification &amp; Transparency</h2>
            <div class="mt-4 space-y-3 text-midnight-600 leading-relaxed">
                <p>
                    Certification details, when available, are listed with lab name and report number so you can independently verify documentation.
                    @if($gemstone->certificate_url)
                        The report link is provided for direct checking before purchase.
                    @endif
                </p>
                <p>
                    Treatment status is disclosed as reported. If a treatment is unknown or pending, that is explicitly stated to avoid assumptions.
                    This listing does not make medical, legal, financial, or guaranteed-outcome claims.
                </p>
                <p>
                    Ethical sourcing and documentation integrity are part of our listing process. For technical background, review
                    <a href="{{ route('education.gia-vs-igi') }}" class="underline hover:text-emerald-700">GIA vs IGI certification</a>
                    and
                    <a href="{{ route('education.certification') }}" class="underline hover:text-emerald-700">gemstone certification explained</a>.
                </p>
            </div>
        </section>

        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-3xl text-midnight-900">Why Buy This {{ $typeLabel }} in Canada</h2>
            <div class="mt-4 space-y-3 text-midnight-600 leading-relaxed">
                <p>
                    CAD-first pricing helps avoid exchange-rate confusion during purchase planning. GST/HST is applied based on shipping province, with clear totals before final payment confirmation.
                </p>
                <p>
                    Orders can be shipped across Canada with insured delivery options and tracking. Documentation-first listings are designed to support careful buying decisions, including review time for report details and treatment disclosures.
                </p>
                <p>
                    Continue browsing <a href="{{ $typeLink ?? route('gemstones') }}" class="underline hover:text-emerald-700">Certified {{ $typeLabel }} in Canada</a>
                    or read the
                    <a href="{{ route('education.buying-in-canada') }}" class="underline hover:text-emerald-700">Buying gemstones in Canada guide</a>
                    before placing a purchase request.
                </p>
            </div>
        </section>

        <x-related-links
            context="product"
            title="Related guides"
            :data="[
                'type_slug' => $typeSlug,
                'gem_type' => $typeLabel,
            ]"
        />

        @if($gemstone->symbolic_meaning)
            <div class="bg-ivory rounded-2xl p-4 text-sm text-midnight-600">
                <h3 class="font-semibold text-midnight-900 mb-2">Traditional &amp; Cultural Context</h3>
                <p>{{ $gemstone->symbolic_meaning }}</p>
                <p class="text-xs text-midnight-500 mt-2">Symbolic meanings are cultural and belief-based. No guarantees or outcomes are implied.</p>
            </div>
        @endif

        <x-seo.faq :items="$faqs" title="FAQs" />
    </div>

    <aside class="bg-white rounded-3xl p-6 shadow-lux border border-platinum h-fit">
        <h3 class="font-display text-xl text-midnight-900">Certificate Viewer</h3>
        <p class="text-sm text-midnight-600 mt-2">Verify gemstone documentation and disclosure before purchase.</p>
        <div class="mt-4">
            @if($gemstone->certificate_url)
                <x-button href="{{ $gemstone->certificate_url }}" variant="outline">View Certificate</x-button>
            @else
                <p class="text-sm text-midnight-500">Certificate available upon request.</p>
            @endif
        </div>

        <div class="mt-6 text-sm text-midnight-600 space-y-2">
            <p><strong>Tax:</strong> {{ $settings['tax_note'] ?? 'GST/HST calculated at checkout based on province.' }}</p>
            <p><strong>Shipping:</strong> Insured shipping available across Canada.</p>
            <p><strong>Compliance:</strong> No guarantees or outcomes are implied.</p>
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
