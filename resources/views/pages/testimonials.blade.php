@extends('layouts.app')

@section('content')
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Client Reviews</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">What Clients Say</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Stories from clients who value our transparent gemstone sourcing and service.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-6">
    @foreach($testimonials as $testimonial)
        <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
            <p class="text-midnight-600">“{{ $testimonial->comment }}”</p>
            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="font-semibold text-midnight-900">{{ $testimonial->name }}</p>
                    <p class="text-sm text-midnight-500">{{ $testimonial->location }}</p>
                </div>
                <div class="text-gold-400">
                    @for($i = 0; $i < $testimonial->rating; $i++)
                        ★
                    @endfor
                </div>
            </div>
        </div>
    @endforeach
</section>
@endsection
