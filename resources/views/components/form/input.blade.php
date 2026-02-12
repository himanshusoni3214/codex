@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
])

<div class="space-y-2">
    <label for="{{ $name }}" class="text-sm font-semibold text-midnight-900">{{ $label }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'w-full rounded-2xl border border-platinum bg-white px-4 py-3 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-200']) }}
    />
    @error($name)
        <p class="text-xs text-emerald-700">{{ $message }}</p>
    @enderror
</div>
