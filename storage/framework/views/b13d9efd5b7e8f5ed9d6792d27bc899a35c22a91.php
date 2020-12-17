<?php
//sfrutto il blade per acquisire i valori di title e content con yield
//e acquisire le pagine di navbar e footer con include
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Custom fonts for this template -->
        <link rel="stylesheet" href="<?php echo asset('/font/fontawesome-free/css/all.min.css'); ?>">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('css/clean-blog.min.css'); ?>">
    </head>

    <body>
        <?php echo $__env->make('shared.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('shared.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\blog\resources\views/master.blade.php ENDPATH**/ ?>