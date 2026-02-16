<header class="sticky top-0 z-40 border-b border-platinum bg-white/95 backdrop-blur">
    <div class="mx-auto max-w-screen-2xl px-4 py-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-[minmax(0,1fr),auto] items-center gap-4">
            <a href="<?php echo e(route('home')); ?>" class="flex min-w-0 items-center gap-3">
                <img src="<?php echo e($settings['logo_path'] ?? '/images/natural-gem-logo.svg'); ?>" alt="Natural Gem Store" class="h-10 w-10 shrink-0">
                <div class="min-w-0 leading-tight">
                    <p class="truncate font-display text-lg text-midnight-900"><?php echo e($settings['site_name'] ?? 'Natural Gem Store'); ?></p>
                    <p class="truncate text-xs uppercase tracking-[0.20em] text-midnight-500">Certified Natural Gemstones</p>
                </div>
            </a>

            <div class="hidden items-center gap-3 xl:flex">
                <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '+1 (647) 555-0199')); ?>"
                    class="hidden whitespace-nowrap text-sm text-midnight-500 transition-colors hover:text-midnight-700 2xl:inline">
                    <?php echo e($settings['contact_phone'] ?? '+1 (647) 555-0199'); ?>

                </a>
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('gemstones')).'','class' => 'whitespace-nowrap px-4 py-2 text-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('gemstones')).'','class' => 'whitespace-nowrap px-4 py-2 text-sm']); ?>
                    Shop Gemstones
                 <?php echo $__env->renderComponent(); ?>
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

            <button class="ml-auto xl:hidden" data-menu-toggle aria-label="Toggle Menu">
                <svg class="h-6 w-6 text-midnight-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 6h18M3 12h18M3 18h18" />
                </svg>
            </button>
        </div>

        <nav class="mt-4 hidden border-t border-platinum pt-3 xl:flex xl:flex-wrap xl:items-center xl:justify-center xl:gap-x-8 xl:gap-y-2 xl:text-[15px] xl:font-medium">
            <a href="<?php echo e(route('gemstones')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">Gemstones</a>
            <a href="<?php echo e(route('certification.index')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">Certification</a>
            <a href="<?php echo e(route('education')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">Education</a>
            <a href="<?php echo e(route('contact')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">Contact</a>
        </nav>
    </div>

    <div class="hidden xl:hidden" data-menu>
        <div class="space-y-2 border-t bg-white px-4 pb-4 pt-2">
            <a href="<?php echo e(route('gemstones')); ?>" class="block py-1">Gemstones</a>
            <a href="<?php echo e(route('certification.index')); ?>" class="block py-1">Certification</a>
            <a href="<?php echo e(route('education')); ?>" class="block py-1">Education</a>
            <a href="<?php echo e(route('contact')); ?>" class="block py-1">Contact</a>
            <a href="<?php echo e(route('consultation')); ?>" class="block py-1">Book Consultation</a>
            <a href="<?php echo e(route('order.create')); ?>" class="block py-1">Purchase Request</a>
            <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '+1 (647) 555-0199')); ?>" class="block py-1">
                <?php echo e($settings['contact_phone'] ?? '+1 (647) 555-0199'); ?>

            </a>
            <a href="<?php echo e(route('gemstones')); ?>" class="block py-2 font-semibold text-emerald-700">Shop Gemstones</a>
        </div>
    </div>
</header>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/header.blade.php ENDPATH**/ ?>