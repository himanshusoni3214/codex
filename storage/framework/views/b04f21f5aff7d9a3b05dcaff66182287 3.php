<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button'
]); ?>
<?php foreach (array_filter(([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $base = 'inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold transition duration-200';
    $variants = [
        'primary' => 'bg-emerald-700 text-white hover:bg-emerald-800 shadow-lux',
        'outline' => 'border border-emerald-700 text-emerald-700 hover:bg-emerald-50',
        'light' => 'bg-gold-300 text-midnight-900 hover:bg-gold-200',
    ];
    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($href): ?>
    <a href="<?php echo e($href); ?>" <?php echo e($attributes->merge(['class' => $classes])); ?>>
        <?php echo e($slot); ?>

    </a>
<?php else: ?>
    <button type="<?php echo e($type); ?>" <?php echo e($attributes->merge(['class' => $classes])); ?>>
        <?php echo e($slot); ?>

    </button>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/button.blade.php ENDPATH**/ ?>