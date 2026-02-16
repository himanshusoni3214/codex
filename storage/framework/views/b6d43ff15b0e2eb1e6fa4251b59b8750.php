<?php $__env->startSection('content'); ?>
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Inventory</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Available Inventory</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">A curated inventory list with transparent pricing and documentation available upon request.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories->count()): ?>
        <div class="flex flex-wrap gap-3 text-sm text-midnight-600">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="bg-white border border-platinum rounded-full px-4 py-2"><?php echo e($category->category); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $inventoryItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal06dbbed650cedb80e6b6853b0240c4a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06dbbed650cedb80e6b6853b0240c4a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.inventory-card','data' => ['item' => $item]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('inventory-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06dbbed650cedb80e6b6853b0240c4a3)): ?>
<?php $attributes = $__attributesOriginal06dbbed650cedb80e6b6853b0240c4a3; ?>
<?php unset($__attributesOriginal06dbbed650cedb80e6b6853b0240c4a3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06dbbed650cedb80e6b6853b0240c4a3)): ?>
<?php $component = $__componentOriginal06dbbed650cedb80e6b6853b0240c4a3; ?>
<?php unset($__componentOriginal06dbbed650cedb80e6b6853b0240c4a3); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <div class="mt-10 bg-ivory rounded-3xl p-6 border border-platinum text-sm text-midnight-600">
        <p>All prices shown in CAD. GST/HST is calculated at checkout where applicable. Inventory availability may change as items are reserved or sold.</p>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/inventory.blade.php ENDPATH**/ ?>