<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title' => '',
    'content' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title' => '',
    'content' => '',
]); ?>
<?php foreach (array_filter(([
    'title' => '',
    'content' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<section class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
    <h2 class="font-display text-2xl text-midnight-900"><?php echo e($title); ?></h2>
    <div class="text-midnight-600 mt-3 leading-relaxed prose prose-sm max-w-none prose-headings:font-display prose-headings:text-midnight-900 prose-p:text-midnight-600">
        <?php echo $content; ?>

    </div>
</section>

<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/seo/section.blade.php ENDPATH**/ ?>