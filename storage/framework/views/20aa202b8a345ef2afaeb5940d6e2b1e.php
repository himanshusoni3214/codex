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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.hero','data' => ['eyebrow' => 'GTA Service Area','title' => $page->hero_title ?: ($cityName . ' Gemstone Store'),'subtitle' => $page->hero_subtitle ?: ($page->excerpt ?: 'Certified natural gemstones for ' . $cityName . ' with Toronto/GTA appointment support.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'GTA Service Area','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->hero_title ?: ($cityName . ' Gemstone Store')),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->hero_subtitle ?: ($page->excerpt ?: 'Certified natural gemstones for ' . $cityName . ' with Toronto/GTA appointment support.'))]); ?>
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
        <h2 class="font-display text-2xl text-midnight-900"><?php echo e($page->title); ?></h2>
        <div class="prose prose-sm max-w-none mt-4 text-midnight-600 prose-headings:text-midnight-900 prose-headings:font-display">
            <?php echo $page->content; ?>

        </div>

        <div class="mt-6 rounded-2xl border border-platinum bg-ivory p-4 text-sm text-midnight-600">
            <p><strong>Map section:</strong> Embed your verified map for <?php echo e($cityName); ?> appointment support.</p>
            <p class="mt-2"><strong>Primary location:</strong> <?php echo e($settings['contact_address'] ?? 'Toronto, Ontario, Canada'); ?></p>
            <p><strong>Phone:</strong> <?php echo e($settings['contact_phone'] ?? '+1 (647) 555-0199'); ?></p>
            <p><strong>Email:</strong> <?php echo e($settings['contact_email'] ?? 'hello@naturalgem.com'); ?></p>
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h3 class="font-display text-xl text-midnight-900">Service Area Links</h3>
            <div class="mt-4 space-y-2 text-sm">
                <a href="<?php echo e(route('consultation')); ?>" class="block underline text-midnight-600 hover:text-emerald-700">Book Consultation</a>
                <a href="<?php echo e(route('order.create')); ?>" class="block underline text-midnight-600 hover:text-emerald-700">Purchase Request</a>
                <a href="<?php echo e(route('gemstones')); ?>" class="block underline text-midnight-600 hover:text-emerald-700">Browse Gemstone Inventory</a>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h3 class="font-display text-xl text-midnight-900">Testimonial Snippets</h3>
            <div class="mt-4 space-y-3 text-sm text-midnight-600">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <blockquote class="border-l-2 border-emerald-600 pl-3">
                        “<?php echo e($item['quote']); ?>”
                        <cite class="block mt-1 text-xs text-midnight-500">— <?php echo e($item['name']); ?></cite>
                    </blockquote>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 pb-16 space-y-6">
    <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <h2 class="font-display text-2xl text-midnight-900">Top Gemstone Categories</h2>
        <div class="mt-4 flex flex-wrap gap-2 text-sm">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('gemstones.show', ['slug' => $type->slug])); ?>" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-500">
                    <?php echo e($type->name); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <?php if (isset($component)) { $__componentOriginal8526fd1a95575a0462518c4a63594b00 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8526fd1a95575a0462518c4a63594b00 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.cta-blocks','data' => ['heading' => 'Serving '.e($cityName).' and the GTA','subtitle' => 'Consultation appointments and purchase support are available with transparent CAD pricing and disclosures.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.cta-blocks'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heading' => 'Serving '.e($cityName).' and the GTA','subtitle' => 'Consultation appointments and purchase support are available with transparent CAD pricing and disclosures.']); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/local/gta.blade.php ENDPATH**/ ?>