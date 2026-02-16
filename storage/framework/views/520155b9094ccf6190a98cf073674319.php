<header class="bg-white/90 backdrop-blur border-b border-platinum sticky top-0 z-40">
    <div class="max-w-screen-2xl mx-auto px-4 py-4 grid grid-cols-[auto,minmax(0,1fr),auto] items-center gap-4 lg:gap-5">
        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 shrink-0 lg:min-w-[240px]">
            <img src="<?php echo e($settings['logo_path'] ?? '/images/natural-gem-logo.svg'); ?>" alt="Natural Gem Store" class="h-10 w-10">
            <div class="leading-tight">
                <p class="font-display text-lg text-midnight-900"><?php echo e($settings['site_name'] ?? 'Natural Gem Store'); ?></p>
                <p class="hidden xl:block text-xs uppercase tracking-[0.20em] text-midnight-500">Certified Natural Gemstones</p>
            </div>
        </a>

        <nav class="hidden lg:flex min-w-0 items-center justify-center gap-2 2xl:gap-4 text-[13px] 2xl:text-[15px] font-medium">
            <a href="<?php echo e(route('gemstones')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">Gemstones</a>
            <a href="<?php echo e(route('gemstones')); ?>#browse-by-type" class="whitespace-nowrap hover:text-emerald-700 transition-colors">
                <span class="2xl:hidden">Types</span>
                <span class="hidden 2xl:inline">Browse by Gemstone Type</span>
            </a>
            <a href="<?php echo e(route('gemstones')); ?>#browse-by-origin" class="whitespace-nowrap hover:text-emerald-700 transition-colors">
                <span class="2xl:hidden">Origins</span>
                <span class="hidden 2xl:inline">Browse by Origin</span>
            </a>
            <a href="<?php echo e(route('education')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">Education</a>
            <a href="<?php echo e(route('about')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">About</a>
            <a href="<?php echo e(route('consultation')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">
                <span class="2xl:hidden">Consultation</span>
                <span class="hidden 2xl:inline">Traditional Consultation</span>
            </a>
            <a href="<?php echo e(route('testimonials')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">Reviews</a>
            <a href="<?php echo e(route('contact')); ?>" class="whitespace-nowrap hover:text-emerald-700 transition-colors">Contact</a>
        </nav>

        <div class="hidden lg:flex items-center gap-3 shrink-0">
            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('gemstones')).'','class' => 'whitespace-nowrap px-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('gemstones')).'','class' => 'whitespace-nowrap px-4']); ?>
                <span class="2xl:hidden">Shop</span>
                <span class="hidden 2xl:inline">Shop Gemstones</span>
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

        <button class="ml-auto lg:hidden col-start-3" data-menu-toggle aria-label="Toggle Menu">
            <svg class="h-6 w-6 text-midnight-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 6h18M3 12h18M3 18h18" />
            </svg>
        </button>
    </div>

    <div class="lg:hidden hidden" data-menu>
        <div class="px-4 pb-4 pt-2 space-y-2 bg-white border-t">
            <a href="<?php echo e(route('gemstones')); ?>" class="block py-1">Gemstones</a>
            <a href="<?php echo e(route('gemstones')); ?>#browse-by-type" class="block py-1">Browse by Gemstone Type</a>
            <a href="<?php echo e(route('gemstones')); ?>#browse-by-origin" class="block py-1">Browse by Origin</a>
            <a href="<?php echo e(route('education')); ?>" class="block py-1">Education</a>
            <a href="<?php echo e(route('about')); ?>" class="block py-1">About</a>
            <a href="<?php echo e(route('consultation')); ?>" class="block py-1">Traditional Consultation</a>
            <a href="<?php echo e(route('testimonials')); ?>" class="block py-1">Reviews</a>
            <a href="<?php echo e(route('contact')); ?>" class="block py-1">Contact</a>
            <a href="<?php echo e(route('gemstones')); ?>" class="block py-2 font-semibold text-emerald-700">Shop Gemstones</a>
        </div>
    </div>
</header>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/components/header.blade.php ENDPATH**/ ?>