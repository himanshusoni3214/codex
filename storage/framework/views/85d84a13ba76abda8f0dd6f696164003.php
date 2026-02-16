<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found | Natural Gem Store</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
</head>
<body class="bg-ivory text-midnight-900">
    <main class="min-h-screen flex items-center">
        <section class="max-w-3xl mx-auto px-6 py-20">
            <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">404</p>
            <h1 class="font-display text-5xl mt-3">Page Not Found</h1>
            <p class="mt-4 text-midnight-600">
                The page you requested is not available. You can continue by browsing our gemstone catalog or education hub.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="<?php echo e(route('gemstones')); ?>" class="inline-flex items-center rounded-full bg-emerald-700 px-5 py-2.5 text-white">Browse Gemstones</a>
                <a href="<?php echo e(route('education')); ?>" class="inline-flex items-center rounded-full border border-midnight-300 px-5 py-2.5">Read Education Guides</a>
                <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center rounded-full border border-midnight-300 px-5 py-2.5">Contact Us</a>
            </div>
        </section>
    </main>
</body>
</html>
<?php /**PATH /Users/Himanshu/Documents/Mac Documents/naturalgem/resources/views/errors/404.blade.php ENDPATH**/ ?>