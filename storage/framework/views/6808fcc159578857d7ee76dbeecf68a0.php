<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.admin-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="max-w-6xl mx-auto px-4 py-12">
    <div class="flex items-center justify-between">
        <h1 class="font-display text-3xl text-midnight-900">Gemstones</h1>
        <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('admin.gemstones.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.gemstones.create')).'']); ?>Add Gemstone <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mt-4 text-sm text-emerald-700"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="mt-6 bg-white rounded-3xl shadow-lux border border-platinum overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-ivory text-midnight-900">
                <tr>
                    <th class="text-left p-4">Title</th>
                    <th class="text-left p-4">Category</th>
                    <th class="text-left p-4">Price (CAD)</th>
                    <th class="text-left p-4">Featured</th>
                    <th class="text-right p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $gemstones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gemstone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="p-4"><?php echo e($gemstone->title); ?></td>
                        <td class="p-4 text-midnight-600"><?php echo e($gemstone->category); ?></td>
                        <td class="p-4 text-midnight-600"><?php echo e($gemstone->display_price); ?></td>
                        <td class="p-4"><?php echo e($gemstone->is_featured ? 'Yes' : 'No'); ?></td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?php echo e(route('admin.gemstones.edit', $gemstone)); ?>" class="text-emerald-700">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.gemstones.destroy', $gemstone)); ?>" class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-emerald-700" onclick="return confirm('Delete this gemstone?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/admin/gemstones/index.blade.php ENDPATH**/ ?>