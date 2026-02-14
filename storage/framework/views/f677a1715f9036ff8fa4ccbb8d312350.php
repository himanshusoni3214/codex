<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal55cb0bab01fede933c30aaea5d0d6c71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal55cb0bab01fede933c30aaea5d0d6c71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.breadcrumbs','data' => ['items' => $breadcrumbs ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($breadcrumbs ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal55cb0bab01fede933c30aaea5d0d6c71)): ?>
<?php $attributes = $__attributesOriginal55cb0bab01fede933c30aaea5d0d6c71; ?>
<?php unset($__attributesOriginal55cb0bab01fede933c30aaea5d0d6c71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal55cb0bab01fede933c30aaea5d0d6c71)): ?>
<?php $component = $__componentOriginal55cb0bab01fede933c30aaea5d0d6c71; ?>
<?php unset($__componentOriginal55cb0bab01fede933c30aaea5d0d6c71); ?>
<?php endif; ?>

<?php
    $cleanCategories = collect($categories ?? [])
        ->map(fn ($category) => trim((string) ($category->category ?? '')))
        ->filter()
        ->unique()
        ->values();
?>

<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Inventory Shop</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Available Gemstone Inventory</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Curated inventory with transparent pricing, per-carat rates, and quantity visibility. Documentation and disclosure are available on request.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cleanCategories->isNotEmpty()): ?>
        <div class="flex flex-wrap gap-3 text-sm text-midnight-600">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cleanCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="bg-white border border-platinum rounded-full px-4 py-2"><?php echo e($category); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="<?php echo e($cleanCategories->isNotEmpty() ? 'mt-8' : 'mt-0'); ?> grid md:grid-cols-2 gap-6 items-start">
        <div id="browse-by-type" class="bg-white rounded-3xl p-6 border border-platinum shadow-lux scroll-mt-28 h-auto">
            <h2 class="font-display text-2xl text-midnight-900">Browse by Gemstone Type</h2>
            <div class="mt-4 flex flex-wrap gap-2 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $gemstoneTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('gemstones.show', ['slug' => $type->slug])); ?>" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-400">
                        <?php echo e($type->name); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        <div id="browse-by-origin" class="bg-white rounded-3xl p-6 border border-platinum shadow-lux scroll-mt-28 h-auto">
            <h2 class="font-display text-2xl text-midnight-900">Browse by Origin</h2>
            <div class="mt-4 space-y-4 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $originGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div>
                        <p class="text-xs uppercase tracking-[0.2em] text-midnight-500"><?php echo e($group->type->name); ?></p>
                        <div class="mt-2 flex flex-wrap gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $group->origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('gemstones.silo.origin', ['type' => $group->type->slug, 'origin' => $origin->slug])); ?>" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-400">
                                    <?php echo e($origin->name); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="flex flex-wrap gap-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($origin->primary_type_slug)): ?>
                                <a href="<?php echo e(route('gemstones.silo.origin', ['type' => $origin->primary_type_slug, 'origin' => $origin->slug])); ?>" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-400">
                                    <?php echo e($origin->name); ?>

                                </a>
                            <?php else: ?>
                                <span class="bg-ivory border border-platinum rounded-full px-4 py-2"><?php echo e($origin->name); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <?php if (isset($component)) { $__componentOriginala3e014dcb9115b1b4bf667b08328ed9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3e014dcb9115b1b4bf667b08328ed9f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.gemstone.product-grid','data' => ['gemstones' => $gemstones]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('gemstone.product-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['gemstones' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($gemstones)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3e014dcb9115b1b4bf667b08328ed9f)): ?>
<?php $attributes = $__attributesOriginala3e014dcb9115b1b4bf667b08328ed9f; ?>
<?php unset($__attributesOriginala3e014dcb9115b1b4bf667b08328ed9f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3e014dcb9115b1b4bf667b08328ed9f)): ?>
<?php $component = $__componentOriginala3e014dcb9115b1b4bf667b08328ed9f; ?>
<?php unset($__componentOriginala3e014dcb9115b1b4bf667b08328ed9f); ?>
<?php endif; ?>
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