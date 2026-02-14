<?php $__env->startSection('content'); ?>
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Client Reviews</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">What Clients Say</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">Stories from clients who value our transparent gemstone sourcing and service.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-6">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
            <p class="text-midnight-600">“<?php echo e($testimonial->comment); ?>”</p>
            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="font-semibold text-midnight-900"><?php echo e($testimonial->name); ?></p>
                    <p class="text-sm text-midnight-500"><?php echo e($testimonial->location); ?></p>
                </div>
                <div class="text-gold-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < $testimonial->rating; $i++): ?>
                        ★
                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/testimonials.blade.php ENDPATH**/ ?>