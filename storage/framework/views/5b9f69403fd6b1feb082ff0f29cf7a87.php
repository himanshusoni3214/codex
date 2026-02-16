<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'items' => [
        ['title' => 'Certified', 'text' => 'GIA / IGI / independent lab references'],
        ['title' => 'Transparent', 'text' => 'Treatment disclosures shown when known'],
        ['title' => 'Canada-first', 'text' => 'CAD pricing with GST/HST clarity'],
        ['title' => 'Ethical', 'text' => 'Sourcing information shared on request'],
    ],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'items' => [
        ['title' => 'Certified', 'text' => 'GIA / IGI / independent lab references'],
        ['title' => 'Transparent', 'text' => 'Treatment disclosures shown when known'],
        ['title' => 'Canada-first', 'text' => 'CAD pricing with GST/HST clarity'],
        ['title' => 'Ethical', 'text' => 'Sourcing information shared on request'],
    ],
]); ?>
<?php foreach (array_filter(([
    'items' => [
        ['title' => 'Certified', 'text' => 'GIA / IGI / independent lab references'],
        ['title' => 'Transparent', 'text' => 'Treatment disclosures shown when known'],
        ['title' => 'Canada-first', 'text' => 'CAD pricing with GST/HST clarity'],
        ['title' => 'Ethical', 'text' => 'Sourcing information shared on request'],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<section class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-ivory rounded-2xl p-4 border border-platinum">
            <p class="font-semibold text-midnight-900"><?php echo e($item['title'] ?? ''); ?></p>
            <p class="text-sm text-midnight-600 mt-1"><?php echo e($item['text'] ?? ''); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/seo/trust-badges.blade.php ENDPATH**/ ?>