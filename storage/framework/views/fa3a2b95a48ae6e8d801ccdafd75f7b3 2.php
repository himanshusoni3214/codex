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

<?php if (isset($component)) { $__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.hero','data' => ['eyebrow' => 'Toronto','title' => 'Toronto Gemstone Store','subtitle' => 'Certified natural gemstones for Toronto and the GTA with CAD pricing, transparent disclosures, and report-first documentation.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Toronto','title' => 'Toronto Gemstone Store','subtitle' => 'Certified natural gemstones for Toronto and the GTA with CAD pricing, transparent disclosures, and report-first documentation.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb)): ?>
<?php $attributes = $__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb; ?>
<?php unset($__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb)): ?>
<?php $component = $__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb; ?>
<?php unset($__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb); ?>
<?php endif; ?>

<section class="max-w-6xl mx-auto px-4 py-12 grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h2 class="font-display text-2xl text-midnight-900">Local Trust & Buying Confidence</h2>
        <p class="text-midnight-600 mt-3">Natural Gem Store serves Toronto clients with clear gemstone documentation, treatment disclosure, and province-based GST/HST handling. Product context is educational and no outcomes are implied.</p>
        <div class="mt-6 rounded-2xl border border-platinum bg-ivory p-4 text-sm text-midnight-600">
            <p><strong>Map Placeholder:</strong> Embed your verified Google Business map here.</p>
            <p class="mt-2">Address: <?php echo e($settings['contact_address'] ?? 'Toronto, Ontario, Canada'); ?></p>
            <p>Phone: <?php echo e($settings['contact_phone'] ?? '+1 (647) 555-0199'); ?></p>
            <p>Email: <?php echo e($settings['contact_email'] ?? 'hello@naturalgem.com'); ?></p>
            <p class="mt-2"><strong>Areas served:</strong> Toronto, GTA, and Ontario.</p>
        </div>
        <div class="mt-6 flex flex-wrap gap-3">
            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('consultation')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('consultation')).'']); ?>Book Consultation <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('order.create')).'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('order.create')).'','variant' => 'outline']); ?>Purchase Request <?php echo $__env->renderComponent(); ?>
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
    <div class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h3 class="font-display text-xl text-midnight-900">Browse by Gemstone</h3>
        <div class="mt-4 space-y-2 text-sm">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('gemstones.show', ['slug' => $type->slug])); ?>" class="block underline text-midnight-600 hover:text-emerald-700"><?php echo e($type->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 pb-16">
    <div class="grid lg:grid-cols-2 gap-6">
        <div class="bg-ivory rounded-3xl p-6 border border-platinum">
            <h3 class="font-display text-2xl text-midnight-900">Browse by Origin</h3>
            <div class="mt-4 grid md:grid-cols-2 gap-3 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($origin->primary_type_slug)): ?>
                        <a href="<?php echo e(route('gemstones.silo.origin', ['type' => $origin->primary_type_slug, 'origin' => $origin->slug])); ?>" class="bg-white border border-platinum rounded-full px-4 py-2 text-center hover:border-emerald-400"><?php echo e($origin->name); ?></a>
                    <?php else: ?>
                        <span class="bg-white border border-platinum rounded-full px-4 py-2 text-center"><?php echo e($origin->name); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h3 class="font-display text-2xl text-midnight-900">Related Guides</h3>
            <div class="mt-4 space-y-2 text-sm">
                <a href="<?php echo e(route('education.buying-in-canada')); ?>" class="block underline text-midnight-600 hover:text-emerald-700">Buying Gemstones in Canada</a>
                <a href="<?php echo e(route('education.gia-vs-igi')); ?>" class="block underline text-midnight-600 hover:text-emerald-700">GIA vs IGI</a>
                <a href="<?php echo e(route('education.natural-vs-treated')); ?>" class="block underline text-midnight-600 hover:text-emerald-700">Natural vs Treated Gemstones</a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/local/toronto-gemstone-store.blade.php ENDPATH**/ ?>