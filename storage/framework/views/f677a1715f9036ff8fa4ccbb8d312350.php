<?php $__env->startSection('content'); ?>
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Inventory Shop</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Available Gemstone Inventory</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Curated inventory with transparent pricing, per-carat rates, and quantity visibility. Documentation and disclosure are available on request.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16">
    <div class="flex flex-wrap gap-3 text-sm text-midnight-600">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="bg-white border border-platinum rounded-full px-4 py-2"><?php echo e($category->category); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <div class="mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $gemstones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gemstone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

    <div class="mt-10 bg-ivory rounded-3xl p-6 border border-platinum text-sm text-midnight-600">
        <p>All prices shown in CAD. <?php echo e($settings['tax_note'] ?? 'GST/HST is calculated at checkout based on your province.'); ?> Certificates and treatment disclosures are provided with every gemstone.</p>
    </div>

    <div class="mt-8 text-sm text-midnight-600">
        <a href="<?php echo e(route('education.certification')); ?>" class="underline">
            Learn how gemstone certification protects buyers →
        </a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/gemstones.blade.php ENDPATH**/ ?>