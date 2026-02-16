<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal55cb0bab01fede933c30aaea5d0d6c71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal55cb0bab01fede933c30aaea5d0d6c71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.breadcrumbs','data' => ['items' => $breadcrumbs ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($breadcrumbs ?? [])]); ?>
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

<?php if (isset($component)) { $__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo.hero','data' => ['eyebrow' => 'Blog','title' => $post->hero_title ?: $post->title,'subtitle' => $post->hero_subtitle ?: ($post->excerpt ?: 'Gemstone education article for Canadian buyers.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Blog','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->hero_title ?: $post->title),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->hero_subtitle ?: ($post->excerpt ?: 'Gemstone education article for Canadian buyers.'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb)): ?>
<?php $attributes = $__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb; ?>
<?php unset($__attributesOriginald52ad55a0579627a3f8d631eb8ff3ddb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb)): ?>
<?php $component = $__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb; ?>
<?php unset($__componentOriginald52ad55a0579627a3f8d631eb8ff3ddb); ?>
<?php endif; ?>

<section class="max-w-6xl mx-auto px-4 py-12 grid lg:grid-cols-3 gap-6">
    <article class="lg:col-span-2 bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <div class="prose prose-sm max-w-none text-midnight-600 prose-headings:font-display prose-headings:text-midnight-900">
            <?php echo $post->content ?: '<p>Article content coming soon.</p>'; ?>

        </div>
    </article>

    <aside class="space-y-6">
        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-xl text-midnight-900">Related Gemstones</h2>
            <div class="mt-4 flex flex-wrap gap-2 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('gemstones.show', ['slug' => $type->slug])); ?>" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-500">
                        <?php echo e($type->name); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>

        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-xl text-midnight-900">Related Posts</h2>
            <div class="mt-4 space-y-2 text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('blog.show', ['slug' => $related->slug])); ?>" class="block underline text-midnight-600 hover:text-emerald-700">
                        <?php echo e($related->title); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    </aside>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/pages/blog/show.blade.php ENDPATH**/ ?>