<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'gemstones' => [],
    'emptyMessage' => 'No inventory currently available for this filter.',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'gemstones' => [],
    'emptyMessage' => 'No inventory currently available for this filter.',
]); ?>
<?php foreach (array_filter(([
    'gemstones' => [],
    'emptyMessage' => 'No inventory currently available for this filter.',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $items = $gemstones instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator
        ? $gemstones->getCollection()
        : collect($gemstones);
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->isEmpty()): ?>
    <div class="bg-white rounded-3xl border border-platinum p-8 text-midnight-600">
        <?php echo e($emptyMessage); ?>

    </div>
<?php else: ?>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gemstone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginalaebde904538c33faceed35a6340d41a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaebde904538c33faceed35a6340d41a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.gemstone-card','data' => ['gemstone' => $gemstone]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('gemstone-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['gemstone' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($gemstone)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaebde904538c33faceed35a6340d41a5)): ?>
<?php $attributes = $__attributesOriginalaebde904538c33faceed35a6340d41a5; ?>
<?php unset($__attributesOriginalaebde904538c33faceed35a6340d41a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaebde904538c33faceed35a6340d41a5)): ?>
<?php $component = $__componentOriginalaebde904538c33faceed35a6340d41a5; ?>
<?php unset($__componentOriginalaebde904538c33faceed35a6340d41a5); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstones instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $gemstones->hasPages()): ?>
        <div class="mt-8">
            <?php echo e($gemstones->onEachSide(1)->links()); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/gemstone/product-grid.blade.php ENDPATH**/ ?>