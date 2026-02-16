<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'source' => null,
    'width' => null,
    'height' => null,
    'alt' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'source' => null,
    'width' => null,
    'height' => null,
    'alt' => '',
]); ?>
<?php foreach (array_filter(([
    'source' => null,
    'width' => null,
    'height' => null,
    'alt' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="w-full h-64 fi-input-wrp rounded-lg shadow-sm ring-1 bg-white dark:bg-white/5 ring-gray-950/10 dark:ring-white/20 overflow-hidden">
    <img
        src="<?php echo e($source); ?>"
        alt="<?php echo e($alt); ?>"
        width="<?php echo e($width); ?>"
        height="<?php echo e($height); ?>"
        class="w-full h-full object-cover"
    />
</div><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/vendor/awcodes/filament-tiptap-editor/resources/views/curator-preview.blade.php ENDPATH**/ ?>