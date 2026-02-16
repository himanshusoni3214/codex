<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'headings' => [],
    'depth' => 0,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'headings' => [],
    'depth' => 0,
]); ?>
<?php foreach (array_filter(([
    'headings' => [],
    'depth' => 0,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<ul class="filament-tiptap-contents-list" data-list-depth="<?php echo e($depth); ?>">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="filament-tiptap-contents-item">
            <a class="filament-tiptap-contents-url" href="#<?php echo e($heading['id']); ?>"><?php echo e($heading['text']); ?></a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(array_key_exists('subs', $heading)): ?>
                <?php if (isset($component)) { $__componentOriginalef4206c069e877305118eefacbc85edd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalef4206c069e877305118eefacbc85edd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.table-of-contents','data' => ['headings' => $heading['subs'],'depth' => $heading['depth']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::table-of-contents'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heading['subs']),'depth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heading['depth'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalef4206c069e877305118eefacbc85edd)): ?>
<?php $attributes = $__attributesOriginalef4206c069e877305118eefacbc85edd; ?>
<?php unset($__attributesOriginalef4206c069e877305118eefacbc85edd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalef4206c069e877305118eefacbc85edd)): ?>
<?php $component = $__componentOriginalef4206c069e877305118eefacbc85edd; ?>
<?php unset($__componentOriginalef4206c069e877305118eefacbc85edd); ?>
<?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</ul>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/vendor/awcodes/filament-tiptap-editor/resources/views/components/table-of-contents.blade.php ENDPATH**/ ?>