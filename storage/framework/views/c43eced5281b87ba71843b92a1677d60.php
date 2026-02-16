<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'statePath' => null,
    'tools' => [],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'statePath' => null,
    'tools' => [],
]); ?>
<?php foreach (array_filter(([
    'statePath' => null,
    'tools' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('media', $tools)): ?>
<div
    class="flex gap-1 items-center"
    x-show="editor().isActive('image', updatedAt)"
    style="display: none;"
>
    <?php if (isset($component)) { $__componentOriginal06672bf012be21bb8964812da299660e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06672bf012be21bb8964812da299660e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.tools.edit-media','data' => ['statePath' => $statePath,'icon' => 'edit','active' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::tools.edit-media'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statePath),'icon' => 'edit','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06672bf012be21bb8964812da299660e)): ?>
<?php $attributes = $__attributesOriginal06672bf012be21bb8964812da299660e; ?>
<?php unset($__attributesOriginal06672bf012be21bb8964812da299660e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06672bf012be21bb8964812da299660e)): ?>
<?php $component = $__componentOriginal06672bf012be21bb8964812da299660e; ?>
<?php unset($__componentOriginal06672bf012be21bb8964812da299660e); ?>
<?php endif; ?>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/vendor/awcodes/filament-tiptap-editor/resources/views/components/menus/image-bubble-menu.blade.php ENDPATH**/ ?>