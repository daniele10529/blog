
<?php $__env->startSection('title','Modifica ticket'); ?>
<?php $__env->startSection('content'); ?>
<div class="container col-md-8 col-md-offset-2">
    <div class="card mt-5">
        <div class="card-header ">
            <h5 class="float-left">Edit ticket</h5>
            <div class="clearfix"></div>
        </div>
        <div class="card-body mt-2">
            <form method="POST">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="alert alert-danger"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <fieldset>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?php echo e($ticket->title); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Content</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="content" name="content"><?php echo e($ticket->content); ?></textarea>
                            <span class="help-block">Feel free to ask us any question.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="status" <?php echo e($ticket->status?"":"checked"); ?> > Close this ticket?
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\ticket\resources\views/ticket/edit.blade.php ENDPATH**/ ?>