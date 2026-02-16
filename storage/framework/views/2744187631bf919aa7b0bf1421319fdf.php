<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'action' => null,
    'active' => null,
    'label' => null,
    'icon' => null,
    'secondary' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'action' => null,
    'active' => null,
    'label' => null,
    'icon' => null,
    'secondary' => false,
]); ?>
<?php foreach (array_filter(([
    'action' => null,
    'active' => null,
    'label' => null,
    'icon' => null,
    'secondary' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    if ($active && ! (str_starts_with($active, '{') || str_starts_with($active, '['))) {
        $active = "'{$active}'";
    }
?>

<button
    type="button"
    x-on:click="<?php echo e($action); ?>"
    <?php echo e($attributes); ?>

    <?php if($label): ?>
        x-tooltip="'<?php echo e($label); ?>'"
    <?php endif; ?>
    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'tiptap-tool rounded block p-0.5 outline-none ring-1 ring-transparent hover:ring-primary-500 focus:ring-primary-500',
        'hover:bg-gray-500/20 focus:bg-gray-500/20' => ! $secondary,
        'hover:bg-gray-500/40 focus:bg-gray-500/40' => $secondary,
    ]); ?>"
    <?php if($active): ?>
        x-bind:class="{ '!bg-gray-500/30': editor().isActive(<?php echo e($active); ?>, updatedAt) }"
    <?php endif; ?>
>
    <?php echo e($slot); ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($icon): ?>
        <span class="sr-only"><?php echo e($label); ?></span>
        <?php if (isset($component)) { $__componentOriginal7c634cdf6f736c358551febe7dde1a17 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c634cdf6f736c358551febe7dde1a17 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.icon','data' => ['icon' => ''.e($icon).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($icon).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c634cdf6f736c358551febe7dde1a17)): ?>
<?php $attributes = $__attributesOriginal7c634cdf6f736c358551febe7dde1a17; ?>
<?php unset($__attributesOriginal7c634cdf6f736c358551febe7dde1a17); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c634cdf6f736c358551febe7dde1a17)): ?>
<?php $component = $__componentOriginal7c634cdf6f736c358551febe7dde1a17; ?>
<?php unset($__componentOriginal7c634cdf6f736c358551febe7dde1a17); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</button>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/vendor/awcodes/filament-tiptap-editor/resources/views/components/button.blade.php ENDPATH**/ ?>