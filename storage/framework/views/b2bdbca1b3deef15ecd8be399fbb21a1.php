<footer class="bg-midnight-900 text-white">
    <div class="max-w-6xl mx-auto px-4 py-12 grid md:grid-cols-4 gap-8">
        <div>
            <div class="flex items-center gap-3">
                <img src="<?php echo e($settings['logo_path'] ?? '/images/natural-gem-logo.svg'); ?>" alt="Natural Gem" class="h-10 w-10">
                <div>
                    <p class="font-display text-lg"><?php echo e($settings['site_name'] ?? 'Natural Gem'); ?></p>
                    <p class="text-xs uppercase tracking-[0.28em] text-gold-300">Certified Natural Gemstones</p>
                </div>
            </div>
            <p class="mt-4 text-sm text-white/70">Canada-first gemstone specialists focused on transparency, certification, and ethical sourcing.</p>
            <p class="mt-4 text-xs text-white/60">No guarantees or outcomes are implied for any cultural or belief-based guidance.</p>
        </div>

        <div>
            <h4 class="font-semibold text-gold-200 mb-3">Explore</h4>
            <ul class="space-y-2 text-sm text-white/80">
                <li><a href="<?php echo e(route('gemstones')); ?>" class="hover:text-white">Gemstones</a></li>
                <li><a href="<?php echo e(route('education')); ?>" class="hover:text-white">Education Hub</a></li>
                <li><a href="<?php echo e(route('about')); ?>" class="hover:text-white">About</a></li>
                <li><a href="<?php echo e(route('consultation')); ?>" class="hover:text-white">Traditional Consultation</a></li>
                <li><a href="<?php echo e(route('contact')); ?>" class="hover:text-white">Contact</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold text-gold-200 mb-3">Featured Gemstones</h4>
            <ul class="space-y-2 text-sm text-white/80">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $navGemstones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gemstone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('gemstones.show', $gemstone)); ?>" class="hover:text-white"><?php echo e($gemstone->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold text-gold-200 mb-3">Contact</h4>
            <p class="text-sm text-white/80"><?php echo e($settings['contact_address'] ?? 'Toronto, Ontario, Canada'); ?></p>
            <p class="text-sm text-white/80 mt-2"><?php echo e($settings['contact_phone'] ?? '+1 (647) 555-0199'); ?></p>
            <p class="text-sm text-white/80"><?php echo e($settings['contact_email'] ?? 'hello@naturalgem.com'); ?></p>
            <div class="mt-4">
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('contact')).'','variant' => 'light']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('contact')).'','variant' => 'light']); ?>Request Assistance <?php echo $__env->renderComponent(); ?>
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
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-6xl mx-auto px-4 py-4 text-xs text-white/60 flex flex-col md:flex-row justify-between gap-2">
            <span>&copy; <?php echo e(date('Y')); ?> <?php echo e($settings['site_name'] ?? 'Natural Gem'); ?>. All rights reserved.</span>
            <span>GST/HST applied where applicable. <?php echo e($settings['tax_note'] ?? ''); ?></span>
        </div>
        <div class="max-w-6xl mx-auto px-4 pb-6 text-xs text-white/50">
            <a href="<?php echo e(route('terms')); ?>" class="hover:text-white">Terms</a> ·
            <a href="<?php echo e(route('privacy')); ?>" class="hover:text-white">Privacy</a> ·
            <a href="<?php echo e(route('refunds')); ?>" class="hover:text-white">Refunds</a> ·
            <a href="<?php echo e(route('disclaimer')); ?>" class="hover:text-white">Disclaimer</a>
        </div>
    </div>
</footer>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/footer.blade.php ENDPATH**/ ?>