
<?php $__env->startSection('title','Tutti i ticket'); ?>
<?php $__env->startSection('content'); ?>
<div class="container col-md-8 col-md-offset-2 mt-5">
        <div class="card">
            <div class="card-header ">
                <h5 class="float-left"><?php echo e($ticket->title); ?></h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <p> <strong>Status</strong>: <?php echo e($ticket->status ? 'Pending' : 'Answered'); ?></p>
                <p> <?php echo e($ticket->content); ?> </p>
                <a href="<?php echo e(action('App\Http\Controllers\TicketsController@edit',$ticket->slug)); ?>" class="btn btn-info float-left mr-2">Edit</a>
                <form method="POST" action="<?php echo e(action('App\Http\Controllers\TicketsController@destroy',$ticket->slug)); ?>" class="float-left">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <button type="submit" class="btn btn-warning">Delete</button>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\ticket\resources\views/ticket/show.blade.php ENDPATH**/ ?>