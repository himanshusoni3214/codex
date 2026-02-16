<?php $__env->startSection('content'); ?>
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Inventory Detail</p>
            <h1 class="font-display text-4xl text-midnight-900 mt-3"><?php echo e($item->title); ?></h1>
            <p class="text-lg text-midnight-600 mt-4"><?php echo e($item->short_description); ?></p>
            <div class="mt-4 text-emerald-700 font-semibold text-lg"><?php echo e($item->display_price); ?></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->sku): ?>
                <div class="mt-2 text-sm text-midnight-500">SKU: <?php echo e($item->sku); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="mt-6 flex flex-wrap gap-4">
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('order.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('order.create')).'']); ?>Request Purchase <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('inventory')).'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('inventory')).'','variant' => 'outline']); ?>Back to Inventory <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-10 shadow-lux border border-platinum">
            <div class="bg-ivory rounded-2xl p-10">
                <img src="<?php echo e($item->image ?? '/images/gemstones/emerald.svg'); ?>" alt="<?php echo e($item->title); ?>" class="h-48 w-full max-w-[75%] mx-auto object-contain" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='/images/gemstones/emerald.svg';">
            </div>
            <div class="mt-6 text-sm text-midnight-600">
                <p><strong>Type:</strong> <?php echo e($item->product_type ?? 'Inventory Item'); ?></p>
                <p><strong>Category:</strong> <?php echo e($item->gem_type ?? '—'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <h2 class="font-display text-3xl text-midnight-900">Item Overview</h2>
        <p class="text-midnight-600 mt-4 leading-relaxed"><?php echo e($item->description); ?></p>

        <div class="mt-6 grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-ivory rounded-2xl p-4">Rate per Carat: <?php echo e($item->rate_per_carat ? 'CAD $' . number_format($item->rate_per_carat, 2) : '—'); ?></div>
            <div class="bg-ivory rounded-2xl p-4">Total Weight (ct): <?php echo e($item->total_weight ?? '—'); ?></div>
            <div class="bg-ivory rounded-2xl p-4">Total Quantity: <?php echo e($item->total_quantity ?? '—'); ?></div>
            <div class="bg-ivory rounded-2xl p-4">Weight per Piece (ct): <?php echo e($item->weight_per_piece ?? '—'); ?></div>
            <div class="bg-ivory rounded-2xl p-4">Origin: <?php echo e($item->origin ?? '—'); ?></div>
            <div class="bg-ivory rounded-2xl p-4">Treatment: <?php echo e($item->treatment ?? '—'); ?></div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->notes): ?>
            <div class="mt-8 bg-ivory rounded-2xl p-4 text-sm text-midnight-600">
                <h3 class="font-semibold text-midnight-900 mb-2">Notes</h3>
                <p><?php echo e($item->notes); ?></p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <aside class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-xl text-midnight-900">Availability & Disclosure</h3>
        <p class="text-sm text-midnight-600 mt-2">Inventory availability may change as items are reserved or sold. Documentation and disclosure are provided upon request.</p>
        <div class="mt-6 text-sm text-midnight-600">
            <p><strong>Tax:</strong> GST/HST calculated at checkout based on province.</p>
            <p class="mt-2"><strong>Disclaimer:</strong> No guarantees or outcomes are implied.</p>
        </div>
    </aside>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/inventory-detail.blade.php ENDPATH**/ ?>