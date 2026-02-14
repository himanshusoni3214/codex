<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'label',
    'name',
    'rows' => 4,
    'placeholder' => '',
    'value' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'label',
    'name',
    'rows' => 4,
    'placeholder' => '',
    'value' => '',
]); ?>
<?php foreach (array_filter(([
    'label',
    'name',
    'rows' => 4,
    'placeholder' => '',
    'value' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="space-y-2">
    <label for="<?php echo e($name); ?>" class="text-sm font-semibold text-midnight-900"><?php echo e($label); ?></label>
    <textarea
        id="<?php echo e($name); ?>"
        name="<?php echo e($name); ?>"
        rows="<?php echo e($rows); ?>"
        placeholder="<?php echo e($placeholder); ?>"
        <?php echo e($attributes->merge(['class' => 'w-full rounded-2xl border border-platinum bg-white px-4 py-3 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-200'])); ?>

    ><?php echo e(old($name, $value)); ?></textarea>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-xs text-emerald-700"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/form/textarea.blade.php ENDPATH**/ ?>