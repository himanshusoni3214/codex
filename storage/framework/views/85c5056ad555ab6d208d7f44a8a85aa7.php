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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.hero','data' => ['eyebrow' => 'Gemstone Guide','title' => $origin ? 'Buy ' . $type->name . ' from ' . $origin->name . ' in Canada' : 'Buy ' . $type->name . ' in Canada','subtitle' => $origin?->hero_subtitle ?? $type->hero_subtitle ?? 'Certified inventory with CAD pricing, treatment disclosure, and report-first transparency.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Gemstone Guide','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($origin ? 'Buy ' . $type->name . ' from ' . $origin->name . ' in Canada' : 'Buy ' . $type->name . ' in Canada'),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($origin?->hero_subtitle ?? $type->hero_subtitle ?? 'Certified inventory with CAD pricing, treatment disclosure, and report-first transparency.')]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.section','data' => ['title' => 'Overview','content' => $introContent ?: 'Explore this gemstone category with certification-first context and Canadian buying guidance.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Overview','content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($introContent ?: 'Explore this gemstone category with certification-first context and Canadian buying guidance.')]); ?>
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
    <?php if (isset($component)) { $__componentOriginal97694ea287f938bf257c9db531450ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97694ea287f938bf257c9db531450ad6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.section','data' => ['title' => 'History & Context','content' => $historyContent ?: 'This page provides educational context, sourcing perspective, and quality guidance for Canadian gemstone buyers.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'History & Context','content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($historyContent ?: 'This page provides educational context, sourcing perspective, and quality guidance for Canadian gemstone buyers.')]); ?>
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
    <?php if (isset($component)) { $__componentOriginal97694ea287f938bf257c9db531450ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97694ea287f938bf257c9db531450ad6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.section','data' => ['title' => 'Canadian Buying Guide','content' => $buyingGuideContent ?: 'Expect CAD pricing, GST/HST handling by shipping province, and transparent report/disclosure documentation before purchase.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Canadian Buying Guide','content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($buyingGuideContent ?: 'Expect CAD pricing, GST/HST handling by shipping province, and transparent report/disclosure documentation before purchase.')]); ?>
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
    <?php if (isset($component)) { $__componentOriginal97694ea287f938bf257c9db531450ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97694ea287f938bf257c9db531450ad6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.section','data' => ['title' => 'Certification & Documentation','content' => $certificationContent ?: 'Certificates from recognized labs help verify identity and quality characteristics. Report links are provided whenever available.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Certification & Documentation','content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($certificationContent ?: 'Certificates from recognized labs help verify identity and quality characteristics. Report links are provided whenever available.')]); ?>
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
    <?php if (isset($component)) { $__componentOriginal97694ea287f938bf257c9db531450ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97694ea287f938bf257c9db531450ad6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.section','data' => ['title' => 'Treatment Disclosure','content' => $treatmentContent ?: 'Treatment information is disclosed for each listing where known. This information is provided for informed buying decisions.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Treatment Disclosure','content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($treatmentContent ?: 'Treatment information is disclosed for each listing where known. This information is provided for informed buying decisions.')]); ?>
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
    <?php if (isset($component)) { $__componentOriginal37db2c605c61c279ebc9663bd105edcf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37db2c605c61c279ebc9663bd105edcf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.faq','data' => ['items' => $faqItems]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.faq'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($faqItems)]); ?>
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
    <?php if (isset($component)) { $__componentOriginalf33ddeea62c5a6f9de905d23ca79ee92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf33ddeea62c5a6f9de905d23ca79ee92 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.related-links','data' => ['context' => 'gemstone_type','title' => 'Related guides','data' => [
            'type_slug' => $type->slug,
        ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('related-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['context' => 'gemstone_type','title' => 'Related guides','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
            'type_slug' => $type->slug,
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
</section>

<section class="max-w-6xl mx-auto px-4 pb-16">
    <div class="flex items-end justify-between mb-6">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Filtered Inventory</p>
            <h2 class="font-display text-3xl text-midnight-900 mt-2">
                <?php echo e($origin ? $type->name . ' from ' . $origin->name : $type->name); ?> Stones
            </h2>
        </div>
        <a href="<?php echo e(route('education')); ?>" class="text-sm underline text-midnight-600">See education hub</a>
    </div>

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

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showThinContentWarning ?? false): ?>
        <div class="mt-6 bg-ivory rounded-2xl border border-platinum p-4 text-sm text-midnight-600">
            Inventory on this page is currently limited. We continue updating listings and disclosures as new certified pieces become available.
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($relatedEducation ?? collect())->isNotEmpty()): ?>
        <div class="mt-10 bg-ivory rounded-3xl p-6 border border-platinum">
            <h3 class="font-display text-2xl text-midnight-900">Related Education</h3>
            <div class="mt-4 grid md:grid-cols-3 gap-4 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedEducation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educationPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('education.show', $educationPage->slug)); ?>" class="bg-white rounded-2xl p-4 border border-platinum hover:border-emerald-400">
                        <p class="font-semibold text-midnight-900"><?php echo e($educationPage->title); ?></p>
                        <p class="text-midnight-600 mt-1"><?php echo e($educationPage->excerpt); ?></p>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/gemstone-silo.blade.php ENDPATH**/ ?>