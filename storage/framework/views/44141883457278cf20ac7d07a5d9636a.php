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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('link', $tools)): ?>
<div
    class="flex gap-1 items-center"
    x-show="editor().isActive('link', updatedAt)"
    style="display: none;"
>
    <span x-text="editor().getAttributes('link', updatedAt).href" class="max-w-xs truncate overflow-hidden whitespace-nowrap"></span>
    <?php if (isset($component)) { $__componentOriginal33e10ebb3c8dffce197baf94e2f989ed = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33e10ebb3c8dffce197baf94e2f989ed = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.tools.link','data' => ['statePath' => $statePath,'icon' => 'edit','active' => false,'label' => ''.e(trans('filament-tiptap-editor::editor.link.edit')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::tools.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statePath),'icon' => 'edit','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'label' => ''.e(trans('filament-tiptap-editor::editor.link.edit')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33e10ebb3c8dffce197baf94e2f989ed)): ?>
<?php $attributes = $__attributesOriginal33e10ebb3c8dffce197baf94e2f989ed; ?>
<?php unset($__attributesOriginal33e10ebb3c8dffce197baf94e2f989ed); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33e10ebb3c8dffce197baf94e2f989ed)): ?>
<?php $component = $__componentOriginal33e10ebb3c8dffce197baf94e2f989ed; ?>
<?php unset($__componentOriginal33e10ebb3c8dffce197baf94e2f989ed); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalde4dd57dbfe94b8420aa2bcba8a902ef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalde4dd57dbfe94b8420aa2bcba8a902ef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.tools.remove-link','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::tools.remove-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalde4dd57dbfe94b8420aa2bcba8a902ef)): ?>
<?php $attributes = $__attributesOriginalde4dd57dbfe94b8420aa2bcba8a902ef; ?>
<?php unset($__attributesOriginalde4dd57dbfe94b8420aa2bcba8a902ef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalde4dd57dbfe94b8420aa2bcba8a902ef)): ?>
<?php $component = $__componentOriginalde4dd57dbfe94b8420aa2bcba8a902ef; ?>
<?php unset($__componentOriginalde4dd57dbfe94b8420aa2bcba8a902ef); ?>
<?php endif; ?>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/vendor/awcodes/filament-tiptap-editor/resources/views/components/menus/link-bubble-menu.blade.php ENDPATH**/ ?>