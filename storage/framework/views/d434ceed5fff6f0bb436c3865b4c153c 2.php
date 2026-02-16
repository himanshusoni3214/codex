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
    $relatedContext = match ($hubType ?? null) {
        'astrology' => 'astrology',
        'certification' => 'certification',
        'engagement' => 'engagement',
        default => null,
    };
?>

<?php if (isset($component)) { $__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.hero','data' => ['eyebrow' => $hubEyebrow ?? 'Gemstone Library','title' => $hubTitle ?? (optional($page)->hero_title ?? optional($page)->title ?? 'Gemstone Hub'),'subtitle' => $hubSubtitle ?? (optional($page)->hero_subtitle ?? optional($page)->excerpt ?? '')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hubEyebrow ?? 'Gemstone Library'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hubTitle ?? (optional($page)->hero_title ?? optional($page)->title ?? 'Gemstone Hub')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hubSubtitle ?? (optional($page)->hero_subtitle ?? optional($page)->excerpt ?? ''))]); ?>
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

<section class="max-w-6xl mx-auto px-4 py-12 space-y-6">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty(optional($page)->content)): ?>
        <?php if (isset($component)) { $__componentOriginal97694ea287f938bf257c9db531450ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97694ea287f938bf257c9db531450ad6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.section','data' => ['title' => optional($page)->title,'content' => optional($page)->content]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(optional($page)->title),'content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(optional($page)->content)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97694ea287f938bf257c9db531450ad6)): ?>
<?php $attributes = $__attributesOriginal97694ea287f938bf257c9db531450ad6; ?>
<?php unset($__attributesOriginal97694ea287f938bf257c9db531450ad6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97694ea287f938bf257c9db531450ad6)): ?>
<?php $component = $__componentOriginal97694ea287f938bf257c9db531450ad6; ?>
<?php unset($__componentOriginal97694ea287f938bf257c9db531450ad6); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalfb9a2d7836a11ffd4acfc6ac205170d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb9a2d7836a11ffd4acfc6ac205170d0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.trust-badges','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.trust-badges'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb9a2d7836a11ffd4acfc6ac205170d0)): ?>
<?php $attributes = $__attributesOriginalfb9a2d7836a11ffd4acfc6ac205170d0; ?>
<?php unset($__attributesOriginalfb9a2d7836a11ffd4acfc6ac205170d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb9a2d7836a11ffd4acfc6ac205170d0)): ?>
<?php $component = $__componentOriginalfb9a2d7836a11ffd4acfc6ac205170d0; ?>
<?php unset($__componentOriginalfb9a2d7836a11ffd4acfc6ac205170d0); ?>
<?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedContext): ?>
        <?php if (isset($component)) { $__componentOriginalf33ddeea62c5a6f9de905d23ca79ee92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf33ddeea62c5a6f9de905d23ca79ee92 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.related-links','data' => ['context' => $relatedContext,'title' => 'Related guides','data' => ['slug' => optional($page)->slug]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('related-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['context' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($relatedContext),'title' => 'Related guides','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['slug' => optional($page)->slug])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf33ddeea62c5a6f9de905d23ca79ee92)): ?>
<?php $attributes = $__attributesOriginalf33ddeea62c5a6f9de905d23ca79ee92; ?>
<?php unset($__attributesOriginalf33ddeea62c5a6f9de905d23ca79ee92); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf33ddeea62c5a6f9de905d23ca79ee92)): ?>
<?php $component = $__componentOriginalf33ddeea62c5a6f9de905d23ca79ee92; ?>
<?php unset($__componentOriginalf33ddeea62c5a6f9de905d23ca79ee92); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h2 class="font-display text-2xl text-midnight-900">Explore Pages</h2>
        <p class="text-sm text-midnight-600 mt-2">Browse topic pages curated for Canadian gemstone buyers.</p>

        <div class="mt-5 grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="border border-platinum rounded-2xl p-4 bg-ivory">
                    <h3 class="font-display text-xl text-midnight-900"><?php echo e($item->hero_title ?: $item->title); ?></h3>
                    <p class="text-sm text-midnight-600 mt-2"><?php echo e($item->excerpt ?: 'Educational guidance with disclosure-first buying context.'); ?></p>
                    <div class="mt-4">
                        <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e($item->url).'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e($item->url).'','variant' => 'outline']); ?>Read Guide <?php echo $__env->renderComponent(); ?>
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
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-sm text-midnight-600">Pages will appear here after publishing.</div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($relatedTypes ?? collect())->isNotEmpty()): ?>
        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-2xl text-midnight-900">Browse Certified Gemstones</h2>
            <div class="mt-4 flex flex-wrap gap-2 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('gemstones.show', ['slug' => $type->slug])); ?>" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-500">
                        <?php echo e($type->name); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8526fd1a95575a0462518c4a63594b00 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8526fd1a95575a0462518c4a63594b00 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.cta-blocks','data' => ['heading' => $ctaHeading ?? 'Book an appointment with Natural Gem Store','subtitle' => $ctaSubtitle ?? 'Consultation and purchase requests are available across Toronto and the GTA.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.cta-blocks'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ctaHeading ?? 'Book an appointment with Natural Gem Store'),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ctaSubtitle ?? 'Consultation and purchase requests are available across Toronto and the GTA.')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8526fd1a95575a0462518c4a63594b00)): ?>
<?php $attributes = $__attributesOriginal8526fd1a95575a0462518c4a63594b00; ?>
<?php unset($__attributesOriginal8526fd1a95575a0462518c4a63594b00); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8526fd1a95575a0462518c4a63594b00)): ?>
<?php $component = $__componentOriginal8526fd1a95575a0462518c4a63594b00; ?>
<?php unset($__componentOriginal8526fd1a95575a0462518c4a63594b00); ?>
<?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/seo/hub.blade.php ENDPATH**/ ?>