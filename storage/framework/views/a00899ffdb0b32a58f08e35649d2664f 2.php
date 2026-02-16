<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.admin-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="font-display text-3xl text-midnight-900">Page Meta</h1>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mt-4 text-sm text-emerald-700"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="mt-6 bg-white rounded-3xl shadow-lux border border-platinum overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-ivory text-midnight-900">
                <tr>
                    <th class="text-left p-4">Title</th>
                    <th class="text-left p-4">Slug</th>
                    <th class="text-right p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="p-4"><?php echo e($page->title); ?></td>
                        <td class="p-4 text-midnight-600"><?php echo e($page->slug); ?></td>
                        <td class="p-4 text-right">
                            <a href="<?php echo e(route('admin.pages.edit', $page)); ?>" class="text-emerald-700">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/admin/pages/index.blade.php ENDPATH**/ ?>