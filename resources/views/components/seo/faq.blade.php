@props([
    'items' => [],
    'title' => 'Frequently Asked Questions',
])

@if(!empty($items))
    @php
        // Only emit FAQPage JSON-LD when FAQs are visibly rendered.
        $faqSchema = app(\App\SEO\Schema\FaqPageSchema::class)->build($items);
    @endphp

    @push('schema')
        @include('seo.schema.faq-jsonld', ['schema' => $faqSchema])
    @endpush

    <section class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">{{ $title }}</h2>
        <div class="mt-4 space-y-4">
            @foreach($items as $item)
                <div class="bg-ivory rounded-2xl p-4">
                    <h3 class="font-semibold text-midnight-900">{{ $item['question'] ?? '' }}</h3>
                    <p class="text-sm text-midnight-600 mt-2">{{ $item['answer'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endif
