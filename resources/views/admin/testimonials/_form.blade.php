@php
    $isEdit = isset($testimonial);
@endphp

<form method="POST" action="{{ $isEdit ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" class="space-y-4">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <x-form.input label="Name" name="name" :value="$testimonial->name ?? ''" />
    <x-form.input label="Location" name="location" :value="$testimonial->location ?? ''" />
    <x-form.input label="Rating (1-5)" name="rating" type="number" :value="$testimonial->rating ?? 5" />
    <x-form.textarea label="Comment" name="comment" rows="5" :value="$testimonial->comment ?? ''" />

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_featured" value="1" class="h-4 w-4" @checked(old('is_featured', $testimonial->is_featured ?? false))>
        <label class="text-sm text-midnight-700">Featured</label>
    </div>

    <x-button type="submit">{{ $isEdit ? 'Update Testimonial' : 'Create Testimonial' }}</x-button>
</form>
