<?php
    $mountedFormComponentActionsData = $getLivewire()->mountedFormComponentActionsData;

    $data = $mountedFormComponentActionsData[array_key_last($mountedFormComponentActionsData)];
?>

<div class="rounded-lg p-4 bg-gray-100 dark:bg-gray-950">
    <div class="grid gap-4" style="grid-template-columns: repeat(<?php echo e($data['columns']); ?>, minmax(0, 1fr))">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($data['asymmetric']): ?>
            <div
                class="bg-gray-300 dark:bg-gray-800 rounded-lg border border-dashed border-white dark:border-gray-600 p-0.5 text-center"
                style="grid-column: span <?php echo e($data['asymmetric_left']); ?>;"
            >
                <p>1</p>
            </div>
            <div
                class="bg-gray-300 dark:bg-gray-800 rounded-lg border border-dashed border-white dark:border-gray-600 p-0.5 text-center"
                style="grid-column: span <?php echo e($data['asymmetric_right']); ?>;"
            >
                <p>1</p>
            </div>
        <?php else: ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($data['columns']) && $data['columns'] > 0): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = range(1, $data['columns']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-gray-300 dark:bg-gray-800 rounded-lg border border-dashed border-white dark:border-gray-600 p-0.5 text-center">
                        <p><?php echo e($column); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/vendor/awcodes/filament-tiptap-editor/resources/views/components/grid-modal-preview.blade.php ENDPATH**/ ?>