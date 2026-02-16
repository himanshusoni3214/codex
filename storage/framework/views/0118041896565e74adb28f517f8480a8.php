<?php
    $seoMeta = $seoMeta ?? [];
?>

<title><?php echo e($seoMeta['title'] ?? 'Natural Gem Store Canada'); ?></title>
<meta name="description" content="<?php echo e($seoMeta['description'] ?? ''); ?>">
<meta name="robots" content="<?php echo e($seoMeta['robots'] ?? 'index,follow'); ?>">
<link rel="canonical" href="<?php echo e($seoMeta['canonical'] ?? app(\App\Services\SeoUrlService::class)->current(request())); ?>">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($seoMeta['prev_url'])): ?>
    <link rel="prev" href="<?php echo e($seoMeta['prev_url']); ?>">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($seoMeta['next_url'])): ?>
    <link rel="next" href="<?php echo e($seoMeta['next_url']); ?>">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<meta property="og:type" content="<?php echo e($seoMeta['og_type'] ?? 'website'); ?>">
<meta property="og:title" content="<?php echo e($seoMeta['og_title'] ?? ($seoMeta['title'] ?? '')); ?>">
<meta property="og:description" content="<?php echo e($seoMeta['og_description'] ?? ($seoMeta['description'] ?? '')); ?>">
<meta property="og:url" content="<?php echo e($seoMeta['og_url'] ?? app(\App\Services\SeoUrlService::class)->current(request())); ?>">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($seoMeta['og_image'])): ?>
    <meta property="og:image" content="<?php echo e($seoMeta['og_image']); ?>">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<meta name="twitter:card" content="<?php echo e($seoMeta['twitter_card'] ?? 'summary_large_image'); ?>">
<meta name="twitter:title" content="<?php echo e($seoMeta['twitter_title'] ?? ($seoMeta['title'] ?? '')); ?>">
<meta name="twitter:description" content="<?php echo e($seoMeta['twitter_description'] ?? ($seoMeta['description'] ?? '')); ?>">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($seoMeta['twitter_image'])): ?>
    <meta name="twitter:image" content="<?php echo e($seoMeta['twitter_image']); ?>">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/partials/seo-meta.blade.php ENDPATH**/ ?>