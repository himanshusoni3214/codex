<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'model' => null,
    'src' => null,
    'alt' => '',
    'class' => '',
    'width' => null,
    'height' => null,
    'loading' => 'lazy',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'model' => null,
    'src' => null,
    'alt' => '',
    'class' => '',
    'width' => null,
    'height' => null,
    'loading' => 'lazy',
]); ?>
<?php foreach (array_filter(([
    'model' => null,
    'src' => null,
    'alt' => '',
    'class' => '',
    'width' => null,
    'height' => null,
    'loading' => 'lazy',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
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
?>

<picture>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($webp): ?>
        <source srcset="<?php echo e($webp); ?>" type="image/webp">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <img
        src="<?php echo e($original); ?>"
        alt="<?php echo e($resolvedAlt); ?>"
        class="<?php echo e($class); ?>"
        loading="<?php echo e($loading); ?>"
        decoding="async"
        <?php if($width): ?> width="<?php echo e($width); ?>" <?php endif; ?>
        <?php if($height): ?> height="<?php echo e($height); ?>" <?php endif; ?>
        onerror="this.onerror=null;this.src='<?php echo e($fallback); ?>';"
    >
</picture>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/responsive-image.blade.php ENDPATH**/ ?>