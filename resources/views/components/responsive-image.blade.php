@props([
    'model' => null,
    'src' => null,
    'alt' => '',
    'class' => '',
    'width' => null,
    'height' => null,
    'loading' => 'lazy',
])

@php
    $fallback = $src ?? '/images/gemstones/emerald.svg';
    $webp = null;
    $original = $fallback;
    $resolvedAlt = trim((string) $alt);

    if ($model && method_exists($model, 'hasMedia') && $model->hasMedia('images')) {
        $media = $model->getFirstMedia('images');
        if ($media) {
            $original = $media->getUrl();
            $webp = $media->hasGeneratedConversion('webp') ? $media->getUrl('webp') : null;
        }
    }

    if ($resolvedAlt === '') {
        $resolvedAlt = trim((string) ($model->seo_image_alt ?? $model->title ?? $model->name ?? 'Natural gemstone image'));
    }
@endphp

<picture>
    @if($webp)
        <source srcset="{{ $webp }}" type="image/webp">
    @endif
    <img
        src="{{ $original }}"
        alt="{{ $resolvedAlt }}"
        class="{{ $class }}"
        loading="{{ $loading }}"
        decoding="async"
        @if($width) width="{{ $width }}" @endif
        @if($height) height="{{ $height }}" @endif
        onerror="this.onerror=null;this.src='{{ $fallback }}';"
    >
</picture>
