<?php
    $schemaOrganization = $schemaOrganization ?? null;
    $schemaWebsite = $schemaWebsite ?? null;
    $schemaLocalBusiness = $schemaLocalBusiness ?? null;
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($schemaOrganization)): ?>
<script type="application/ld+json"><?php echo \App\SEO\Schema\JsonLd::encode($schemaOrganization); ?></script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($schemaWebsite)): ?>
<script type="application/ld+json"><?php echo \App\SEO\Schema\JsonLd::encode($schemaWebsite); ?></script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($schemaLocalBusiness)): ?>
<script type="application/ld+json"><?php echo \App\SEO\Schema\JsonLd::encode($schemaLocalBusiness); ?></script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/seo/schema/sitewide-jsonld.blade.php ENDPATH**/ ?>