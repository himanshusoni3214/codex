<?php
    $schemaItems = $schemaItems ?? [];
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $schemaItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schemaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script type="application/ld+json"><?php echo json_encode($schemaItem, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/partials/schema.blade.php ENDPATH**/ ?>