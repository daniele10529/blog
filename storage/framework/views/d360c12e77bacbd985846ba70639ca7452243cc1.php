
<?php $__env->startSection('title','Tutti i ticket'); ?>
<?php $__env->startSection('content'); ?>
<div class="container col-md-8 col-md-offset-2 t-5">
        <br><br>
        <div class="card">
            <div class="card-header ">
                <h5 class="float-left">Tickets</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-2">
                <?php if(session('status')): ?>
                  <div class="alert alert-success">
                      <?php echo e(session('status')); ?>

                  </div>
                <?php endif; ?>
                <?php if($allTickets->isEmpty()): ?>
                    <p> There is no ticket.</p>
                <?php else: ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($ticket->id); ?> </td>
                                <td><a href="<?php echo e(action('App\Http\Controllers\TicketsController@show',$ticket->slug)); ?>">
                                    <?php echo e($ticket->title); ?></a>
                                </td>
                                <td><?php echo e($ticket->status ? 'Pending' : 'Answered'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\ticket\resources\views/ticket/index.blade.php ENDPATH**/ ?>