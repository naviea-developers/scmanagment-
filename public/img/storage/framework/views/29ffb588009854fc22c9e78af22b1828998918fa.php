<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
        <title><?php echo $__env->yieldContent('title'); ?> - <?php echo $__env->make('frontend.inc.sitename', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </title>
        <?php echo $__env->make('frontend.inc.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body>
       <div class="container"> <?php echo $__env->make('frontend.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
            <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('frontend.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH D:\desktop\MTH\NewAdminTamplate\resources\views/frontend/master.blade.php ENDPATH**/ ?>