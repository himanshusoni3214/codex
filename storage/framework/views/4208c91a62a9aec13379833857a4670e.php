<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['gemstone']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['gemstone']); ?>
<?php foreach (array_filter((['gemstone']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="bg-white rounded-3xl shadow-lux border border-platinum overflow-hidden flex flex-col">
    <div class="h-44 bg-ivory flex items-center justify-center p-8">
        <img src="<?php echo e($gemstone->image ?? '/images/gemstones/emerald.svg'); ?>" alt="<?php echo e($gemstone->title); ?>" class="max-h-24 max-w-[70%] object-contain" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='/images/gemstones/emerald.svg';">
    </div>
    <div class="p-6 flex flex-col flex-1">
        <p class="text-xs uppercase tracking-[0.2em] text-midnight-500"><?php echo e($gemstone->gem_type ?? $gemstone->category); ?></p>
        <h3 class="font-display text-xl text-midnight-900 mt-2"><?php echo e($gemstone->title); ?></h3>
        <p class="text-sm text-midnight-600 mt-2 flex-1"><?php echo e($gemstone->short_description); ?></p>
        <div class="mt-3 text-sm text-emerald-700 font-semibold"><?php echo e($gemstone->display_price); ?></div>
        <div class="mt-2 text-xs text-midnight-500">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstone->display_rate_per_carat): ?>
                CAD $<?php echo e(number_format($gemstone->display_rate_per_carat, 2)); ?>/ct
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstone->weight_per_piece): ?>
                <span class="ml-2"><?php echo e(number_format($gemstone->weight_per_piece, 2)); ?> ct/pc</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <span class="ml-2">Available: <?php echo e($gemstone->available_quantity); ?></span>
        </div>
        <div class="mt-4">
            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('gemstones.show', $gemstone)).'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('gemstones.show', $gemstone)).'','variant' => 'outline']); ?>View Details <?php echo $__env->renderComponent(); ?>
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
</div>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/gemstone-card.blade.php ENDPATH**/ ?>