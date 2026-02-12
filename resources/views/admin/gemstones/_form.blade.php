@php
    $isEdit = isset($gemstone);
@endphp

<form method="POST" action="{{ $isEdit ? route('admin.gemstones.update', $gemstone) : route('admin.gemstones.store') }}" class="space-y-4">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="grid md:grid-cols-2 gap-4">
        <x-form.input label="Title" name="title" :value="$gemstone->title ?? ''" />
        <x-form.input label="Slug" name="slug" :value="$gemstone->slug ?? ''" />
    </div>
    <div class="grid md:grid-cols-2 gap-4">
        <x-form.input label="Category" name="category" :value="$gemstone->category ?? ''" />
        <x-form.input label="Price (CAD)" name="price_cad" type="number" step="0.01" :value="$gemstone->price_cad ?? ''" />
    </div>
    <x-form.input label="Short Description" name="short_description" :value="$gemstone->short_description ?? ''" />
    <x-form.textarea label="Description" name="description" rows="6" :value="$gemstone->description ?? ''" />
    <x-form.textarea label="Symbolic Meaning (Optional)" name="symbolic_meaning" rows="4" :value="$gemstone->symbolic_meaning ?? ''" />

    <div class="grid md:grid-cols-3 gap-4">
        <x-form.input label="Carat" name="carat" type="number" step="0.01" :value="$gemstone->carat ?? ''" />
        <x-form.input label="Color" name="color" :value="$gemstone->color ?? ''" />
        <x-form.input label="Clarity" name="clarity" :value="$gemstone->clarity ?? ''" />
    </div>
    <div class="grid md:grid-cols-3 gap-4">
        <x-form.input label="Cut" name="cut" :value="$gemstone->cut ?? ''" />
        <x-form.input label="Shape" name="shape" :value="$gemstone->shape ?? ''" />
        <x-form.input label="Origin" name="origin" :value="$gemstone->origin ?? ''" />
    </div>

    <div class="grid md:grid-cols-3 gap-4">
        <x-form.input label="Certificate Lab" name="certificate_lab" :value="$gemstone->certificate_lab ?? ''" />
        <x-form.input label="Certificate Number" name="certificate_number" :value="$gemstone->certificate_number ?? ''" />
        <x-form.input label="Certificate URL" name="certificate_url" :value="$gemstone->certificate_url ?? ''" />
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        <x-form.input label="Treatment Disclosure" name="treatment" :value="$gemstone->treatment ?? ''" />
        <x-form.input label="Image Path" name="image" :value="$gemstone->image ?? ''" />
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        <x-form.input label="Meta Title" name="meta_title" :value="$gemstone->meta_title ?? ''" />
        <x-form.input label="Meta Description" name="meta_description" :value="$gemstone->meta_description ?? ''" />
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_featured" value="1" class="h-4 w-4" @checked(old('is_featured', $gemstone->is_featured ?? false))>
        <label class="text-sm text-midnight-700">Featured</label>
    </div>

    <x-button type="submit">{{ $isEdit ? 'Update Gemstone' : 'Create Gemstone' }}</x-button>
</form>
