<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title' => 'Related guides',
    'context' => 'default',
    'data' => [],
    'links' => null,
    'max' => 4,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title' => 'Related guides',
    'context' => 'default',
    'data' => [],
    'links' => null,
    'max' => 4,
]); ?>
<?php foreach (array_filter(([
    'title' => 'Related guides',
    'context' => 'default',
    'data' => [],
    'links' => null,
    'max' => 4,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $resolvedLinks = collect($links ?? app(\App\Services\InternalLinkService::class)->for((string) $context, (array) $data, (int) $max))
        ->filter(fn ($link) => !empty($link['label'] ?? null) && !empty($link['url'] ?? null))
        ->take(min(max((int) $max, 1), 4));
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolvedLinks->isNotEmpty()): ?>
    <section <?php echo e($attributes->merge(['class' => 'bg-white rounded-3xl p-5 border border-platinum shadow-lux'])); ?>>
        <h2 class="font-display text-xl text-midnight-900"><?php echo e($title); ?></h2>
        <ul class="mt-3 space-y-2 text-sm text-midnight-600">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $resolvedLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e($link['url']); ?>" class="underline underline-offset-4 decoration-midnight-300 hover:text-emerald-700 hover:decoration-emerald-700">
                        <?php echo e($link['label']); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </ul>
    </section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/related-links.blade.php ENDPATH**/ ?>