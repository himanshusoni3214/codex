<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'gemstones' => [
        ['label' => 'Sapphire', 'url' => '/gemstones/sapphire'],
        ['label' => 'Ruby', 'url' => '/gemstones/ruby'],
    ],
    'guides' => [
        ['label' => 'Gemstone Certification Explained', 'url' => '/education/certification'],
        ['label' => 'GIA vs IGI', 'url' => '/education/gia-vs-igi'],
        ['label' => 'Natural vs Treated', 'url' => '/education/natural-vs-treated'],
        ['label' => 'Buying Gemstones in Canada', 'url' => '/education/buying-gemstones-canada'],
    ],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'gemstones' => [
        ['label' => 'Sapphire', 'url' => '/gemstones/sapphire'],
        ['label' => 'Ruby', 'url' => '/gemstones/ruby'],
    ],
    'guides' => [
        ['label' => 'Gemstone Certification Explained', 'url' => '/education/certification'],
        ['label' => 'GIA vs IGI', 'url' => '/education/gia-vs-igi'],
        ['label' => 'Natural vs Treated', 'url' => '/education/natural-vs-treated'],
        ['label' => 'Buying Gemstones in Canada', 'url' => '/education/buying-gemstones-canada'],
    ],
]); ?>
<?php foreach (array_filter(([
    'gemstones' => [
        ['label' => 'Sapphire', 'url' => '/gemstones/sapphire'],
        ['label' => 'Ruby', 'url' => '/gemstones/ruby'],
    ],
    'guides' => [
        ['label' => 'Gemstone Certification Explained', 'url' => '/education/certification'],
        ['label' => 'GIA vs IGI', 'url' => '/education/gia-vs-igi'],
        ['label' => 'Natural vs Treated', 'url' => '/education/natural-vs-treated'],
        ['label' => 'Buying Gemstones in Canada', 'url' => '/education/buying-gemstones-canada'],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<section class="max-w-4xl mx-auto px-4 pb-14 grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Related Gemstones</h2>
        <div class="mt-4 flex flex-wrap gap-2 text-sm">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $gemstones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gemstone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($gemstone['url']); ?>" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-400">
                    <?php echo e($gemstone['label']); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Related Guides</h2>
        <div class="mt-4 space-y-2 text-sm">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $guides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($guide['url']); ?>" class="block underline text-midnight-600 hover:text-emerald-700">
                    <?php echo e($guide['label']); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/education/related-links.blade.php ENDPATH**/ ?>