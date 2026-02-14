@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    eyebrow="Canada"
    :title="$province . ' Gemstone Buying Guide'"
    :subtitle="$page->excerpt ?: 'Canada-first guidance on GST/HST, shipping, and gemstone disclosure standards.'"
/>

<section class="max-w-6xl mx-auto px-4 py-12 grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h2 class="font-display text-2xl text-midnight-900">{{ $page->title }}</h2>
        <div class="prose prose-sm max-w-none mt-4 text-midnight-600 prose-headings:text-midnight-900 prose-headings:font-display">
            {!! $page->content !!}
        </div>
        <div class="mt-6 rounded-2xl border border-platinum bg-ivory p-4 text-sm text-midnight-600">
            <p><strong>Tax note:</strong> GST/HST is calculated by destination province during checkout.</p>
            <p class="mt-2"><strong>Service areas:</strong> {{ $province }}, major metro regions, and remote shipping zones across Canada where courier coverage exists.</p>
            <p class="mt-2"><strong>Disclosure standard:</strong> Treatment and documentation details are provided when known. No guarantees or outcomes are implied.</p>
        </div>
    </div>
    <div class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h3 class="font-display text-xl text-midnight-900">Browse Gemstones</h3>
        <div class="mt-4 space-y-2 text-sm">
            @foreach($types as $type)
                <a href="{{ route('gemstones.show', ['slug' => $type->slug]) }}" class="block underline text-midnight-600 hover:text-emerald-700">{{ $type->name }}</a>
            @endforeach
        </div>
    </div>
</section>
@endsection
