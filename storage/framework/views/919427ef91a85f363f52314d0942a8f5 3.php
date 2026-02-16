<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        $page = $page ?? null;
        $gemstone = $gemstone ?? null;
        $type = $type ?? null;
        $origin = $origin ?? null;
        $resolvedPaginator = $paginator ?? null;
        if (!$resolvedPaginator && isset($gemstones) && $gemstones instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator) {
            $resolvedPaginator = $gemstones;
        }
        if (!$resolvedPaginator && isset($posts) && $posts instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator) {
            $resolvedPaginator = $posts;
        }
        $seoMeta = $seoMeta ?? app(\App\Services\SeoMetaService::class)->resolve([
            'page' => $page,
            'gemstone' => $gemstone,
            'type' => $type,
            'origin' => $origin,
            'settings' => $settings ?? [],
            'canonical' => $canonical ?? null,
            'paginator' => $resolvedPaginator,
            'force_noindex' => $forceNoindex ?? false,
            'indexable' => $isIndexable ?? null,
        ]);

        // Sitewide JSON-LD: Organization.
        // LocalBusiness is rendered only on contact/local landing routes to match visible local intent.
        $routeName = request()->route()?->getName();
        $includeLocalBusiness = $includeLocalBusiness
            ?? ($routeName === 'contact' || (is_string($routeName) && str_starts_with($routeName, 'local.')) || $routeName === 'gta.show');
        $schemaOrganization = app(\App\SEO\Schema\OrganizationSchema::class)->build($settings ?? []);
        $schemaWebsite = app(\App\SEO\Schema\WebSiteSchema::class)->build($settings ?? []);
        $schemaLocalBusiness = $includeLocalBusiness
            ? app(\App\SEO\Schema\LocalBusinessSchema::class)->build(
                $settings ?? [],
                $localBusinessServiceArea ?? null
            )
            : null;
    ?>
    <?php echo $__env->make('seo.schema.sitewide-jsonld', [
        'schemaOrganization' => $schemaOrganization,
        'schemaWebsite' => $schemaWebsite,
        'schemaLocalBusiness' => $schemaLocalBusiness,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('schema'); ?>
    <?php echo $__env->make('partials.seo-meta', ['seoMeta' => $seoMeta], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="/images/natural-gem-logo.svg" type="image/svg+xml">
    <link rel="dns-prefetch" href="//static.cloudflareinsights.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php echo $__env->yieldPushContent('preload'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="font-body text-graphite bg-ivory">
    <?php if (isset($component)) { $__componentOriginalfd1f218809a441e923395fcbf03e4272 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfd1f218809a441e923395fcbf03e4272 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $attributes = $__attributesOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__attributesOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $component = $__componentOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__componentOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>

    <main class="min-h-screen">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
</body>
</html>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/layouts/app.blade.php ENDPATH**/ ?>