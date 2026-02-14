<?php $__env->startSection('content'); ?>
<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Contact Us</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">Speak With A Gemstone Specialist</h1>
        <p class="text-lg text-midnight-600 mt-4 max-w-3xl">We respond within one business day for product inquiries, certification questions, or bespoke requests.</p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-10">
    <div>
        <h2 class="font-display text-2xl text-midnight-900">Reach Us</h2>
        <div class="mt-4 space-y-3 text-sm text-midnight-600">
            <p><strong>Phone:</strong> <?php echo e($settings['contact_phone'] ?? '+1 (647) 555-0199'); ?></p>
            <p><strong>Email:</strong> <?php echo e($settings['contact_email'] ?? 'hello@naturalgem.com'); ?></p>
            <p><strong>Address:</strong> <?php echo e($settings['contact_address'] ?? 'Toronto, Ontario, Canada'); ?></p>
        </div>
        <div class="mt-8 bg-ivory rounded-3xl p-6 border border-platinum">
            <h3 class="font-display text-xl text-midnight-900">Operating Hours</h3>
            <p class="text-sm text-midnight-600 mt-2">Mon - Fri: 10:00 AM - 6:00 PM</p>
            <p class="text-sm text-midnight-600">Saturday: By appointment</p>
        </div>
    </div>
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Send A Message</h2>
        <p class="text-sm text-midnight-600 mt-2">Share your gemstone preferences or certification questions.</p>
        <div class="mt-6">
            <?php if (isset($component)) { $__componentOriginalb2ce5c1c6ebc7a5e222ea1aea2aa6207 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb2ce5c1c6ebc7a5e222ea1aea2aa6207 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.contact-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('contact-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb2ce5c1c6ebc7a5e222ea1aea2aa6207)): ?>
<?php $attributes = $__attributesOriginalb2ce5c1c6ebc7a5e222ea1aea2aa6207; ?>
<?php unset($__attributesOriginalb2ce5c1c6ebc7a5e222ea1aea2aa6207); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb2ce5c1c6ebc7a5e222ea1aea2aa6207)): ?>
<?php $component = $__componentOriginalb2ce5c1c6ebc7a5e222ea1aea2aa6207; ?>
<?php unset($__componentOriginalb2ce5c1c6ebc7a5e222ea1aea2aa6207); ?>
<?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/contact.blade.php ENDPATH**/ ?>