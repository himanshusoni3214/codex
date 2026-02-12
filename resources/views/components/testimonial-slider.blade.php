@props(['testimonials'])

<div class="relative" data-testimonial-slider>
    <div class="overflow-hidden">
        <div class="flex transition-transform duration-500" data-testimonial-track>
            @foreach($testimonials as $testimonial)
                <div class="min-w-full px-2">
                    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
                        <p class="text-lg text-midnight-700">“{{ $testimonial->comment }}”</p>
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
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex justify-center gap-2 mt-4" data-testimonial-dots>
        @foreach($testimonials as $testimonial)
            <button class="h-2 w-2 rounded-full bg-midnight-200" type="button"></button>
        @endforeach
    </div>
</div>
