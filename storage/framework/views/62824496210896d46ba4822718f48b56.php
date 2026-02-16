<nav class="bg-midnight-900 text-white">
    <div class="max-w-6xl mx-auto px-4 py-3 flex flex-wrap gap-4 text-sm">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="hover:text-gold-200">Dashboard</a>
        <a href="<?php echo e(route('admin.gemstones.index')); ?>" class="hover:text-gold-200">Gemstones</a>
        <a href="<?php echo e(route('admin.testimonials.index')); ?>" class="hover:text-gold-200">Testimonials</a>
        <a href="<?php echo e(route('admin.pages.index')); ?>" class="hover:text-gold-200">Page Meta</a>
        <a href="<?php echo e(route('admin.settings.edit')); ?>" class="hover:text-gold-200">Settings</a>
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="ml-auto">
            <?php echo csrf_field(); ?>
            <button type="submit" class="hover:text-gold-200">Logout</button>
        </form>
    </div>
</nav>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/partials/admin-nav.blade.php ENDPATH**/ ?>