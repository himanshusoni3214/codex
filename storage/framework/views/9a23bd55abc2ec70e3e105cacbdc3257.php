<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.admin-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="max-w-6xl mx-auto px-4 py-12">
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h1 class="font-display text-3xl text-midnight-900">Admin Dashboard</h1>
        <p class="text-midnight-600 mt-3">Manage gemstones, testimonials, and site settings.</p>
        <div class="mt-6 grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            <a href="<?php echo e(route('admin.gemstones.index')); ?>" class="bg-ivory rounded-2xl p-4">Manage Gemstones</a>
            <a href="<?php echo e(route('admin.testimonials.index')); ?>" class="bg-ivory rounded-2xl p-4">Manage Testimonials</a>
            <a href="<?php echo e(route('admin.pages.index')); ?>" class="bg-ivory rounded-2xl p-4">Edit Page Meta</a>
            <a href="<?php echo e(route('admin.settings.edit')); ?>" class="bg-ivory rounded-2xl p-4">Site Settings</a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>