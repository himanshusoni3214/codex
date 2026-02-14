<?php
    $primaryType = $type ?? $gemstone->primary_gemstone_type;
    $primaryOrigin = $origin ?? $gemstone->primary_origin;
    $typeSlug = $primaryType?->slug ?: (\Illuminate\Support\Str::slug($gemstone->gem_type ?? ''));
    $typeLabel = $primaryType?->name ?: ($gemstone->gem_type ?: 'Gemstone');

    $caratValue = $gemstone->carat ?? $gemstone->weight_per_piece ?? $gemstone->weight ?? null;
    $caratLabel = $caratValue ? number_format((float) $caratValue, 2) : null;
    $heroImage = $gemstone->image ?: '/images/gemstones/emerald.svg';
    $seoAlt = $caratLabel
        ? "{$caratLabel} Ct Natural {$typeLabel} - Certified Gemstone in Canada"
        : "Natural {$typeLabel} - Certified Gemstone in Canada";
?>

<?php $__env->startPush('preload'); ?>
    <link rel="preload" as="image" href="<?php echo e($heroImage); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal55cb0bab01fede933c30aaea5d0d6c71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal55cb0bab01fede933c30aaea5d0d6c71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.breadcrumbs','data' => ['items' => $breadcrumbs ?? [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Gemstones', 'url' => route('gemstones')],
    ['label' => $gemstone->title, 'url' => url()->current()],
]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($breadcrumbs ?? [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Gemstones', 'url' => route('gemstones')],
    ['label' => $gemstone->title, 'url' => url()->current()],
])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal55cb0bab01fede933c30aaea5d0d6c71)): ?>
<?php $attributes = $__attributesOriginal55cb0bab01fede933c30aaea5d0d6c71; ?>
<?php unset($__attributesOriginal55cb0bab01fede933c30aaea5d0d6c71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal55cb0bab01fede933c30aaea5d0d6c71)): ?>
<?php $component = $__componentOriginal55cb0bab01fede933c30aaea5d0d6c71; ?>
<?php unset($__componentOriginal55cb0bab01fede933c30aaea5d0d6c71); ?>
<?php endif; ?>

<section class="bg-gemstone-glow">
    <div class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Certified Product Detail</p>
            <h1 class="font-display text-4xl text-midnight-900 mt-3"><?php echo e($gemstone->title); ?></h1>
            <p class="text-lg text-midnight-600 mt-4"><?php echo e($gemstone->short_description); ?></p>

            <div class="mt-4 text-emerald-700 font-semibold text-xl"><?php echo e($gemstone->display_price); ?></div>
            <div class="mt-2 text-sm text-midnight-500">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstone->display_rate_per_carat): ?>
                    CAD $<?php echo e(number_format($gemstone->display_rate_per_carat, 2)); ?>/ct
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstone->weight_per_piece): ?>
                    <span class="ml-2"><?php echo e(number_format($gemstone->weight_per_piece, 2)); ?> ct/pc</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstone->available_quantity !== null): ?>
                    <span class="ml-2">Available pieces: <?php echo e($gemstone->available_quantity); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="mt-4 flex flex-wrap gap-2">
                <span class="text-xs rounded-full bg-white px-3 py-1 border border-platinum">Certified</span>
                <span class="text-xs rounded-full bg-white px-3 py-1 border border-platinum">Ethical Sourcing</span>
                <span class="text-xs rounded-full bg-white px-3 py-1 border border-platinum">Canada-first</span>
            </div>

            <p class="mt-4 text-sm text-midnight-600">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstone->available_quantity > 0): ?>
                    Only <?php echo e($gemstone->available_quantity); ?> piece<?php echo e($gemstone->available_quantity > 1 ? 's' : ''); ?> currently available from this listing.
                <?php else: ?>
                    This listing is currently marked as unavailable. Contact us for restock timing.
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>

            <div class="mt-6 flex flex-wrap gap-4">
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('order.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('order.create')).'']); ?>Request Purchase <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e(route('gemstones')).'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('gemstones')).'','variant' => 'outline']); ?>Back to Gemstones <?php echo $__env->renderComponent(); ?>
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

        <div class="bg-white rounded-3xl p-10 shadow-lux border border-platinum">
            <div class="bg-ivory rounded-2xl p-10">
                <?php if (isset($component)) { $__componentOriginalecfc361c64744489ff7ee842d5dc46c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecfc361c64744489ff7ee842d5dc46c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-image','data' => ['model' => $gemstone,'src' => $gemstone->image,'alt' => $seoAlt,'class' => 'h-56 w-full max-w-[75%] mx-auto object-contain','width' => '640','height' => '480','loading' => 'eager']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($gemstone),'src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($gemstone->image),'alt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($seoAlt),'class' => 'h-56 w-full max-w-[75%] mx-auto object-contain','width' => '640','height' => '480','loading' => 'eager']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecfc361c64744489ff7ee842d5dc46c3)): ?>
<?php $attributes = $__attributesOriginalecfc361c64744489ff7ee842d5dc46c3; ?>
<?php unset($__attributesOriginalecfc361c64744489ff7ee842d5dc46c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecfc361c64744489ff7ee842d5dc46c3)): ?>
<?php $component = $__componentOriginalecfc361c64744489ff7ee842d5dc46c3; ?>
<?php unset($__componentOriginalecfc361c64744489ff7ee842d5dc46c3); ?>
<?php endif; ?>
            </div>
            <div class="mt-6 text-sm text-midnight-600 space-y-1">
                <p><strong>SKU:</strong> <?php echo e($gemstone->sku ?? '—'); ?></p>
                <p><strong>Gemstone Type:</strong> <?php echo e($typeLabel); ?></p>
                <p><strong>Origin:</strong> <?php echo e($gemstone->origin ?? ($primaryOrigin?->name ?? 'Available upon request')); ?></p>
                <p><strong>Certification:</strong> <?php echo e($gemstone->certificate_lab ?? 'Available upon request'); ?> <?php echo e($gemstone->certificate_number ? '(' . $gemstone->certificate_number . ')' : ''); ?></p>
                <p><strong>Treatment Disclosure:</strong> <?php echo e($gemstone->treatment ?? 'Available upon request'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-16 grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-8">
        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-3xl text-midnight-900">Product Overview</h2>
            <div class="mt-4 space-y-4 text-midnight-600 leading-relaxed">
                <p>
                    This <?php echo e(\Illuminate\Support\Str::lower($typeLabel)); ?> listing is structured for buyers who prioritize measurable gemstone quality before any stylistic preference. The listing records visible factors such as carat, color, cut style, clarity notes, and treatment disclosure in one place, so you can compare options on objective criteria. Rather than relying on broad claims, the page presents what is physically documented for this exact stone and what still requires direct lab verification. That approach keeps decision-making transparent for Canadian buyers evaluating premium gemstones online.
                </p>
                <p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($caratLabel): ?>
                        At <?php echo e($caratLabel); ?> ct,
                    <?php else: ?>
                        For this item,
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    weight and rate-per-carat are shown alongside total CAD pricing to make valuation straightforward. Clarity and color are listed as practical buying references, while cut and shape help explain face-up appearance and setting suitability for rings, pendants, or custom commissions. If you are comparing multiple stones in the same budget range, this standardized format helps you assess value quickly without losing detail on certification or disclosure fields.
                </p>
                <p>
                    Use cases vary by buyer intent: some clients purchase for fine jewelry projects, some for collector inventory, and others for culturally meaningful gifting. In each case, documentation-first purchasing reduces ambiguity. Where a certificate number or lab link is available, it is shown directly. Where details are pending, the listing states that clearly instead of implying certainty. This keeps product representation aligned with both compliance expectations and premium retail standards for gemstone commerce in Canada.
                </p>
                <p>
                    <?php echo e($gemstone->description ?: 'Each gemstone is independently reviewed for visual quality, disclosure status, and listing accuracy before publication.'); ?>

                </p>
            </div>

            <div class="mt-6 grid md:grid-cols-2 gap-4 text-sm">
                <div class="bg-ivory rounded-2xl p-4">Carat: <?php echo e($gemstone->carat ?? '—'); ?></div>
                <div class="bg-ivory rounded-2xl p-4">Color: <?php echo e($gemstone->color ?? '—'); ?></div>
                <div class="bg-ivory rounded-2xl p-4">Clarity/Grade: <?php echo e($gemstone->clarity ?? '—'); ?></div>
                <div class="bg-ivory rounded-2xl p-4">Cut: <?php echo e($gemstone->cut ?? '—'); ?></div>
                <div class="bg-ivory rounded-2xl p-4">Shape: <?php echo e($gemstone->shape ?? '—'); ?></div>
                <div class="bg-ivory rounded-2xl p-4">Rate/ct: <?php echo e($gemstone->display_rate_per_carat ? 'CAD $' . number_format($gemstone->display_rate_per_carat, 2) : '—'); ?></div>
                <div class="bg-ivory rounded-2xl p-4">Weight/pc: <?php echo e($gemstone->weight_per_piece ? number_format($gemstone->weight_per_piece, 2) . ' ct' : '—'); ?></div>
                <div class="bg-ivory rounded-2xl p-4">Total Quantity: <?php echo e($gemstone->total_quantity ?? '—'); ?></div>
            </div>
        </section>

        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-3xl text-midnight-900">Certification &amp; Transparency</h2>
            <div class="mt-4 space-y-3 text-midnight-600 leading-relaxed">
                <p>
                    Certification details, when available, are listed with lab name and report number so you can independently verify documentation.
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstone->certificate_url): ?>
                        The report link is provided for direct checking before purchase.
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
                <p>
                    Treatment status is disclosed as reported. If a treatment is unknown or pending, that is explicitly stated to avoid assumptions.
                    This listing does not make medical, legal, financial, or guaranteed-outcome claims.
                </p>
                <p>
                    Ethical sourcing and documentation integrity are part of our listing process. For technical background, review
                    <a href="<?php echo e(route('education.gia-vs-igi')); ?>" class="underline hover:text-emerald-700">GIA vs IGI certification</a>
                    and
                    <a href="<?php echo e(route('education.certification')); ?>" class="underline hover:text-emerald-700">gemstone certification explained</a>.
                </p>
            </div>
        </section>

        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-3xl text-midnight-900">Why Buy This <?php echo e($typeLabel); ?> in Canada</h2>
            <div class="mt-4 space-y-3 text-midnight-600 leading-relaxed">
                <p>
                    CAD-first pricing helps avoid exchange-rate confusion during purchase planning. GST/HST is applied based on shipping province, with clear totals before final payment confirmation.
                </p>
                <p>
                    Orders can be shipped across Canada with insured delivery options and tracking. Documentation-first listings are designed to support careful buying decisions, including review time for report details and treatment disclosures.
                </p>
                <p>
                    Continue browsing <a href="<?php echo e($typeLink ?? route('gemstones')); ?>" class="underline hover:text-emerald-700">Certified <?php echo e($typeLabel); ?> in Canada</a>
                    or read the
                    <a href="<?php echo e(route('education.buying-in-canada')); ?>" class="underline hover:text-emerald-700">Buying gemstones in Canada guide</a>
                    before placing a purchase request.
                </p>
            </div>
        </section>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstone->symbolic_meaning): ?>
            <div class="bg-ivory rounded-2xl p-4 text-sm text-midnight-600">
                <h3 class="font-semibold text-midnight-900 mb-2">Traditional &amp; Cultural Context</h3>
                <p><?php echo e($gemstone->symbolic_meaning); ?></p>
                <p class="text-xs text-midnight-500 mt-2">Symbolic meanings are cultural and belief-based. No guarantees or outcomes are implied.</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal37db2c605c61c279ebc9663bd105edcf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37db2c605c61c279ebc9663bd105edcf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.faq','data' => ['items' => $faqItems ?? [],'title' => 'FAQs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.faq'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($faqItems ?? []),'title' => 'FAQs']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37db2c605c61c279ebc9663bd105edcf)): ?>
<?php $attributes = $__attributesOriginal37db2c605c61c279ebc9663bd105edcf; ?>
<?php unset($__attributesOriginal37db2c605c61c279ebc9663bd105edcf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37db2c605c61c279ebc9663bd105edcf)): ?>
<?php $component = $__componentOriginal37db2c605c61c279ebc9663bd105edcf; ?>
<?php unset($__componentOriginal37db2c605c61c279ebc9663bd105edcf); ?>
<?php endif; ?>
    </div>

    <aside class="bg-white rounded-3xl p-6 shadow-lux border border-platinum h-fit">
        <h3 class="font-display text-xl text-midnight-900">Certificate Viewer</h3>
        <p class="text-sm text-midnight-600 mt-2">Verify gemstone documentation and disclosure before purchase.</p>
        <div class="mt-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gemstone->certificate_url): ?>
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['href' => ''.e($gemstone->certificate_url).'','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e($gemstone->certificate_url).'','variant' => 'outline']); ?>View Certificate <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
            <?php else: ?>
                <p class="text-sm text-midnight-500">Certificate available upon request.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="mt-6 text-sm text-midnight-600 space-y-2">
            <p><strong>Tax:</strong> <?php echo e($settings['tax_note'] ?? 'GST/HST calculated at checkout based on province.'); ?></p>
            <p><strong>Shipping:</strong> Insured shipping available across Canada.</p>
            <p><strong>Compliance:</strong> No guarantees or outcomes are implied.</p>
        </div>

        <div class="mt-8 border-t border-platinum pt-6">
            <h4 class="font-display text-lg text-midnight-900">Reserve a Piece</h4>
            <p class="text-sm text-midnight-600 mt-2">Place a short hold on an available piece. We will confirm by email.</p>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('reservation_success')): ?>
                <p class="mt-3 text-sm text-emerald-700"><?php echo e(session('reservation_success')); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('reservation_error')): ?>
                <p class="mt-3 text-sm text-red-600"><?php echo e(session('reservation_error')); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <form method="POST" action="<?php echo e(route('gemstones.reserve', $gemstone)); ?>" class="mt-4 space-y-3">
                <?php echo csrf_field(); ?>
                <input type="text" name="name" placeholder="Full name" required class="w-full rounded-xl border border-platinum px-4 py-2 text-sm">
                <input type="email" name="email" placeholder="Email (optional)" class="w-full rounded-xl border border-platinum px-4 py-2 text-sm">
                <input type="text" name="phone" placeholder="Phone (optional)" class="w-full rounded-xl border border-platinum px-4 py-2 text-sm">
                <select name="hold_minutes" class="w-full rounded-xl border border-platinum px-4 py-2 text-sm">
                    <option value="60">Hold for 60 minutes</option>
                    <option value="120">Hold for 120 minutes</option>
                </select>
                <textarea name="notes" rows="3" placeholder="Notes (optional)" class="w-full rounded-xl border border-platinum px-4 py-2 text-sm"></textarea>
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>Reserve a Piece <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
            </form>
        </div>
    </aside>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/gemstone-detail.blade.php ENDPATH**/ ?>