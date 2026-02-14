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
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Education Hub</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Learn About Gemstones</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Clear, unbiased education to help you buy responsibly with confidence.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-6">
    <a href="<?php echo e(route('education.certification')); ?>" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Gemstone Certification Explained</h3>
        <p class="text-sm text-midnight-600 mt-2">What certification means and why it matters for value and transparency.</p>
    </a>
    <a href="<?php echo e(route('education.gia-vs-igi')); ?>" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">GIA vs IGI</h3>
        <p class="text-sm text-midnight-600 mt-2">Understand the differences between leading gemological labs.</p>
    </a>
    <a href="<?php echo e(route('education.natural-vs-treated')); ?>" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Natural vs Treated</h3>
        <p class="text-sm text-midnight-600 mt-2">How treatments are disclosed and why transparency is critical.</p>
    </a>
    <a href="<?php echo e(route('education.birthstones-vs-astrology')); ?>" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Birthstones vs Traditional Beliefs</h3>
        <p class="text-sm text-midnight-600 mt-2">Distinguish modern birthstones from cultural gemstone traditions.</p>
    </a>
    <a href="<?php echo e(route('education.buying-in-canada')); ?>" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h3 class="font-display text-2xl text-midnight-900">Buying Gemstones In Canada</h3>
        <p class="text-sm text-midnight-600 mt-2">Tips on pricing, taxes, and verifying authenticity in Canada.</p>
    </a>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $educationPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educationPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!in_array($educationPage->slug, ['education', 'certification', 'gia-vs-igi', 'natural-vs-treated', 'birthstones-vs-astrology', 'buying-gemstones-canada'])): ?>
            <a href="<?php echo e(route('education.show', $educationPage->slug)); ?>" class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
                <h3 class="font-display text-2xl text-midnight-900"><?php echo e($educationPage->title); ?></h3>
                <p class="text-sm text-midnight-600 mt-2"><?php echo e($educationPage->excerpt ?: 'Editorial education content for responsible buyers.'); ?></p>
            </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/education/index.blade.php ENDPATH**/ ?>