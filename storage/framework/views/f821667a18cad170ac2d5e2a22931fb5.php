<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.admin-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="font-display text-3xl text-midnight-900">Add Gemstone</h1>
    <div class="mt-6 bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <?php echo $__env->make('admin.gemstones._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/admin/gemstones/create.blade.php ENDPATH**/ ?>