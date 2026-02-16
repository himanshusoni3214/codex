<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'statePath' => null,
    'icon' => 'link',
    'label' => trans('filament-tiptap-editor::editor.link.insert_edit'),
    'active' => true,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'statePath' => null,
    'icon' => 'link',
    'label' => trans('filament-tiptap-editor::editor.link.insert_edit'),
    'active' => true,
]); ?>
<?php foreach (array_filter(([
    'statePath' => null,
    'icon' => 'link',
    'label' => trans('filament-tiptap-editor::editor.link.insert_edit'),
    'active' => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $useActive = $active ? 'link' : false;
?>

<?php if (isset($component)) { $__componentOriginal74117f8bb7cf8ec0e06f3d6b01d14a31 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74117f8bb7cf8ec0e06f3d6b01d14a31 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.button','data' => ['action' => 'openModal()','active' => $useActive,'label' => $label,'icon' => $icon,'xData' => '{
        openModal() {
            let link = this.editor().getAttributes(\'link\');
            let arguments = {
                href: link.href || \'\',
                id: link.id || null,
                target: link.target || null,
                hreflang: link.hreflang || null,
                rel: link.rel || null,
                referrerpolicy: link.referrerpolicy || null,
                as_button: link.as_button || null,
                button_theme: link.button_theme || null,
                coordinates: this.editor().view.state.selection.ranges,
            };

            $wire.dispatchFormEvent(\'tiptap::setLinkContent\', \''.e($statePath).'\', arguments);
        }
    }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'openModal()','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($useActive),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'x-data' => '{
        openModal() {
            let link = this.editor().getAttributes(\'link\');
            let arguments = {
                href: link.href || \'\',
                id: link.id || null,
                target: link.target || null,
                hreflang: link.hreflang || null,
                rel: link.rel || null,
                referrerpolicy: link.referrerpolicy || null,
                as_button: link.as_button || null,
                button_theme: link.button_theme || null,
                coordinates: this.editor().view.state.selection.ranges,
            };

            $wire.dispatchFormEvent(\'tiptap::setLinkContent\', \''.e($statePath).'\', arguments);
        }
    }']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74117f8bb7cf8ec0e06f3d6b01d14a31)): ?>
<?php $attributes = $__attributesOriginal74117f8bb7cf8ec0e06f3d6b01d14a31; ?>
<?php unset($__attributesOriginal74117f8bb7cf8ec0e06f3d6b01d14a31); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74117f8bb7cf8ec0e06f3d6b01d14a31)): ?>
<?php $component = $__componentOriginal74117f8bb7cf8ec0e06f3d6b01d14a31; ?>
<?php unset($__componentOriginal74117f8bb7cf8ec0e06f3d6b01d14a31); ?>
<?php endif; ?>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/vendor/awcodes/filament-tiptap-editor/resources/views/components/tools/link.blade.php ENDPATH**/ ?>