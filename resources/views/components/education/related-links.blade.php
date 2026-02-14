@props([
    'gemstones' => [
        ['label' => 'Sapphire', 'url' => '/gemstones/sapphire'],
        ['label' => 'Ruby', 'url' => '/gemstones/ruby'],
    ],
    'guides' => [
        ['label' => 'Gemstone Certification Explained', 'url' => '/education/certification'],
        ['label' => 'GIA vs IGI', 'url' => '/education/gia-vs-igi'],
        ['label' => 'Natural vs Treated', 'url' => '/education/natural-vs-treated'],
        ['label' => 'Buying Gemstones in Canada', 'url' => '/education/buying-gemstones-canada'],
    ],
])

<section class="max-w-4xl mx-auto px-4 pb-14 grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Related Gemstones</h2>
        <div class="mt-4 flex flex-wrap gap-2 text-sm">
            @foreach($gemstones as $gemstone)
                <a href="{{ $gemstone['url'] }}" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-400">
                    {{ $gemstone['label'] }}
                </a>
            @endforeach
        </div>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Related Guides</h2>
        <div class="mt-4 space-y-2 text-sm">
            @foreach($guides as $guide)
                <a href="{{ $guide['url'] }}" class="block underline text-midnight-600 hover:text-emerald-700">
                    {{ $guide['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</section>
