<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>">
    </head>
    
    <body>
        <?php echo $__env->make('shared.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <script src="<?php echo asset('jquery/jquery.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\ticket\resources\views/master.blade.php ENDPATH**/ ?>