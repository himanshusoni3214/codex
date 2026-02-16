<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'statePath' => null,
    'icon' => 'media',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'statePath' => null,
    'icon' => 'media',
]); ?>
<?php foreach (array_filter(([
    'statePath' => null,
    'icon' => 'media',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    if (str(config('filament-tiptap-editor.media_action'))->contains('\\')) {
        $action = "\$wire.dispatchFormEvent('tiptap::setMediaContent', '" . $statePath . "', arguments);";
    } else {
        $action = "this.\$dispatch('open-modal', {id: '" . config('filament-tiptap-editor.media_action') . "', statePath: '" . $statePath . "'}, arguments)";
    }
?>

<?php if (isset($component)) { $__componentOriginal74117f8bb7cf8ec0e06f3d6b01d14a31 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74117f8bb7cf8ec0e06f3d6b01d14a31 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.button','data' => ['action' => 'openModal()','label' => ''.e(trans('filament-tiptap-editor::editor.media.insert_edit')).'','active' => 'image','icon' => $icon,'xData' => '{
        openModal() {
            let media = this.editor().getAttributes(\'image\');
            let arguments = {
                type: \'media\',
                src: media.src || \'\',
                alt: media.alt || \'\',
                title: media.title || \'\',
                width: media.width || \'\',
                height: media.height || \'\',
                lazy: media.lazy || false,
                media: media.media || \'\',
                srcset: media.srcset || \'\',
                sizes: media.sizes || \'\',
            };

            '.e($action).'

        }
    }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'openModal()','label' => ''.e(trans('filament-tiptap-editor::editor.media.insert_edit')).'','active' => 'image','icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'x-data' => '{
        openModal() {
            let media = this.editor().getAttributes(\'image\');
            let arguments = {
                type: \'media\',
                src: media.src || \'\',
                alt: media.alt || \'\',
                title: media.title || \'\',
                width: media.width || \'\',
                height: media.height || \'\',
                lazy: media.lazy || false,
                media: media.media || \'\',
                srcset: media.srcset || \'\',
                sizes: media.sizes || \'\',
            };

            '.e($action).'

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
<?php endif; ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/vendor/awcodes/filament-tiptap-editor/resources/views/components/tools/media.blade.php ENDPATH**/ ?>