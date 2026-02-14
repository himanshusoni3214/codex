<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title',
    'subtitle' => null,
    'cta' => null,
    'image' => '/images/hero-gem.svg',
    'imageAlt' => 'Certified gemstone',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title',
    'subtitle' => null,
    'cta' => null,
    'image' => '/images/hero-gem.svg',
    'imageAlt' => 'Certified gemstone',
]); ?>
<?php foreach (array_filter(([
    'title',
    'subtitle' => null,
    'cta' => null,
    'image' => '/images/hero-gem.svg',
    'imageAlt' => 'Certified gemstone',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if (! $__env->hasRenderedOnce('e31dcbdc-04f8-41c4-a2da-7f2daaac9e05')): $__env->markAsRenderedOnce('e31dcbdc-04f8-41c4-a2da-7f2daaac9e05'); ?>
    <?php $__env->startPush('preload'); ?>
        <link rel="preload" as="image" href="<?php echo e($image); ?>" fetchpriority="high">
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<section class="bg-gemstone-glow relative overflow-hidden">
    <div class="absolute inset-0 bg-subtle-grid opacity-50"></div>
    <div class="max-w-6xl mx-auto px-4 py-16 lg:py-24 relative z-10 grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700 font-semibold">Natural Gem</p>
            <h1 class="font-display text-4xl lg:text-5xl text-midnight-900 mt-3 leading-tight"><?php echo e($title); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($subtitle): ?>
                <p class="text-lg text-midnight-700 mt-4 leading-relaxed"><?php echo e($subtitle); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="mt-6 flex flex-wrap gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cta): ?>
                    <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e($cta['url'] ?? '#').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e($cta['url'] ?? '#').'']); ?><?php echo e($cta['label'] ?? 'Shop Gemstones'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('education')).'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('education')).'','variant' => 'outline']); ?>Learn About Certification <?php echo $__env->renderComponent(); ?>
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
        <div class="relative">
            <div class="absolute -top-8 -left-8 w-24 h-24 rounded-full bg-gold-200 blur-2xl opacity-70"></div>
            <div class="bg-white/90 shadow-lux rounded-3xl p-8 border border-platinum">
                <img
                    src="<?php echo e($image); ?>"
                    alt="<?php echo e($imageAlt); ?>"
                    class="w-full h-64 object-cover rounded-2xl"
                    loading="eager"
                    fetchpriority="high"
                    decoding="async"
                    width="960"
                    height="640"
                >
                <div class="mt-6 grid grid-cols-2 gap-4 text-sm">
                    <div class="bg-ivory px-4 py-3 rounded-xl">
                        <p class="text-emerald-700 font-semibold">Certified</p>
                        <p class="text-midnight-600">GIA / IGI Reports</p>
                    </div>
                    <div class="bg-ivory px-4 py-3 rounded-xl">
                        <p class="text-emerald-700 font-semibold">Transparent</p>
                        <p class="text-midnight-600">Treatment Disclosure</p>
                    </div>
                    <div class="bg-ivory px-4 py-3 rounded-xl">
                        <p class="text-emerald-700 font-semibold">Ethical</p>
                        <p class="text-midnight-600">Sourcing Standards</p>
                    </div>
                    <div class="bg-ivory px-4 py-3 rounded-xl">
                        <p class="text-emerald-700 font-semibold">Canada-first</p>
                        <p class="text-midnight-600">Local Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/hero.blade.php ENDPATH**/ ?>