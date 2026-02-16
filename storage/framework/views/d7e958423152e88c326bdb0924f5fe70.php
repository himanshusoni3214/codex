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

<section class="bg-gemstone-glow">
    <div class="max-w-4xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Education</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Natural vs Treated Gemstones</h1>
        <p class="text-lg text-midnight-600 mt-4">Treatments can enhance color or clarity. Transparency matters more than the treatment itself.</p>
    </div>
</section>

<section class="max-w-4xl mx-auto px-4 py-12 space-y-6 text-midnight-600">
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Natural, Untreated</h2>
        <p class="text-sm">No known enhancements. Typically rare and priced accordingly.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Treated</h2>
        <p class="text-sm">Heat or other treatments are common in the trade. We always disclose treatment type and provide certification when available.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Buyer Guidance</h2>
        <p class="text-sm">Ask for the report, review the disclosure, and confirm pricing aligns with treatment status.</p>
    </div>
</section>

<?php if (isset($component)) { $__componentOriginalf33ddeea62c5a6f9de905d23ca79ee92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf33ddeea62c5a6f9de905d23ca79ee92 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.related-links','data' => ['context' => 'education','title' => 'Related guides','data' => ['slug' => 'natural-vs-treated'],'class' => 'max-w-4xl mx-auto px-4 pb-14']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('related-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['context' => 'education','title' => 'Related guides','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['slug' => 'natural-vs-treated']),'class' => 'max-w-4xl mx-auto px-4 pb-14']); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/education/natural-vs-treated.blade.php ENDPATH**/ ?>