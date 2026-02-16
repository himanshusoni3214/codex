@props([
    'items' => [
        ['title' => 'Certified', 'text' => 'GIA / IGI / independent lab references'],
        ['title' => 'Transparent', 'text' => 'Treatment disclosures shown when known'],
        ['title' => 'Canada-first', 'text' => 'CAD pricing with GST/HST clarity'],
        ['title' => 'Ethical', 'text' => 'Sourcing information shared on request'],
    ],
])

<section class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
    @foreach($items as $item)
        <div class="bg-ivory rounded-2xl p-4 border border-platinum">
            <p class="font-semibold text-midnight-900">{{ $item['title'] ?? '' }}</p>
            <p class="text-sm text-midnight-600 mt-1">{{ $item['text'] ?? '' }}</p>
        </div>
    @endforeach
</section>
