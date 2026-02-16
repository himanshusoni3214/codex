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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.hero','data' => ['eyebrow' => 'Education','title' => $page->hero_title ?: $page->title,'subtitle' => $page->hero_subtitle ?: ($page->excerpt ?: 'Practical gemstone education for informed Canadian buyers.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Education','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->hero_title ?: $page->title),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->hero_subtitle ?: ($page->excerpt ?: 'Practical gemstone education for informed Canadian buyers.'))]); ?>
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

<section class="max-w-4xl mx-auto px-4 py-12 space-y-6">
    <?php if (isset($component)) { $__componentOriginal97694ea287f938bf257c9db531450ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97694ea287f938bf257c9db531450ad6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.section','data' => ['title' => $page->title,'content' => $page->content ?: 'Content will be available soon.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->title),'content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->content ?: 'Content will be available soon.')]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.faq','data' => ['items' => $page->faq_items ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.faq'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->faq_items ?? [])]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.related-links','data' => ['context' => 'education','title' => 'Related guides','data' => ['slug' => $page->slug]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('related-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['context' => 'education','title' => 'Related guides','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['slug' => $page->slug])]); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/education/show.blade.php ENDPATH**/ ?>