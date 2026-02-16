<?php
    $schema = $schema ?? null;
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($schema)): ?>
<script type="application/ld+json"><?php echo \App\SEO\Schema\JsonLd::encode($schema); ?></script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/seo/schema/product-jsonld.blade.php ENDPATH**/ ?>