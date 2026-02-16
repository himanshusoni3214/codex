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
    $relatedContext = match ($page->section ?? null) {
        'astrology' => 'astrology',
        'certification' => 'certification',
        'engagement' => 'engagement',
        default => null,
    };
?>

<?php if (isset($component)) { $__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.hero','data' => ['eyebrow' => $sectionLabel ?? 'Guide','title' => $page->hero_title ?: $page->title,'subtitle' => $page->hero_subtitle ?: ($page->excerpt ?: '')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sectionLabel ?? 'Guide'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->hero_title ?: $page->title),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->hero_subtitle ?: ($page->excerpt ?: ''))]); ?>
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
    <?php if (isset($component)) { $__componentOriginal97694ea287f938bf257c9db531450ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97694ea287f938bf257c9db531450ad6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.section','data' => ['title' => $page->title,'content' => $page->content ?: '<p>Content will be available soon.</p>']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->title),'content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->content ?: '<p>Content will be available soon.</p>')]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.related-links','data' => ['context' => $relatedContext,'title' => 'Related guides','data' => [
                'slug' => $page->slug,
            ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('related-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['context' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($relatedContext),'title' => 'Related guides','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                'slug' => $page->slug,
            ])]); ?>
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
    <?php elseif(!empty($page->related_links)): ?>
        <?php if (isset($component)) { $__componentOriginalf33ddeea62c5a6f9de905d23ca79ee92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf33ddeea62c5a6f9de905d23ca79ee92 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.related-links','data' => ['links' => $page->related_links,'title' => 'Related guides']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('related-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['links' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->related_links),'title' => 'Related guides']); ?>
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

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($relatedInventory ?? collect())->isNotEmpty()): ?>
        <section class="space-y-4">
            <h2 class="font-display text-3xl text-midnight-900"><?php echo e($relatedInventoryTitle ?? 'Related Inventory'); ?></h2>
            <?php if (isset($component)) { $__componentOriginala3e014dcb9115b1b4bf667b08328ed9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3e014dcb9115b1b4bf667b08328ed9f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.gemstone.product-grid','data' => ['gemstones' => $relatedInventory]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('gemstone.product-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['gemstones' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($relatedInventory)]); ?>
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
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal37db2c605c61c279ebc9663bd105edcf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37db2c605c61c279ebc9663bd105edcf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.faq','data' => ['items' => $page->faq_items ?? [],'title' => 'Frequently Asked Questions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.faq'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->faq_items ?? []),'title' => 'Frequently Asked Questions']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37db2c605c61c279ebc9663bd105edcf)): ?>
<?php $attributes = $__attributesOriginal37db2c605c61c279ebc9663bd105edcf; ?>
<?php unset($__attributesOriginal37db2c605c61c279ebc9663bd105edcf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37db2c605c61c279ebc9663bd105edcf)): ?>
<?php $component = $__componentOriginal37db2c605c61c279ebc9663bd105edcf; ?>
<?php unset($__componentOriginal37db2c605c61c279ebc9663bd105edcf); ?>
<?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($relatedGuides ?? collect())->isNotEmpty()): ?>
        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-2xl text-midnight-900">Related Guides</h2>
            <div class="mt-4 grid md:grid-cols-2 gap-3 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedGuides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $guideUrl = match ($guide->section ?? null) {
                            'education' => route('education.show', $guide->slug),
                            'astrology' => route('astrology.show', $guide->slug),
                            'certification' => route('certification.show', $guide->slug),
                            'engagement' => route('engagement.show', $guide->slug),
                            default => '#',
                        };
                    ?>
                    <a href="<?php echo e($guideUrl); ?>" class="rounded-2xl border border-platinum bg-ivory px-4 py-3 hover:border-emerald-500">
                        <?php echo e($guide->title); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8526fd1a95575a0462518c4a63594b00 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8526fd1a95575a0462518c4a63594b00 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.cta-blocks','data' => ['heading' => $ctaHeading ?? 'Ready to continue?','subtitle' => $ctaSubtitle ?? 'Book consultation or submit a purchase request with your preferred gemstone details.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.cta-blocks'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ctaHeading ?? 'Ready to continue?'),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ctaSubtitle ?? 'Book consultation or submit a purchase request with your preferred gemstone details.')]); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/seo/detail.blade.php ENDPATH**/ ?>