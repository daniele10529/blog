<?php $__env->startSection('title','Categories'); ?>
<?php $__env->startSection('content'); ?>
<header class="masthead" style="background-image: url(<?php echo e(url('img/dashboard.jpg')); ?>)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Crea le categorie</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">Create a new category</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-2">
                <form method="post">

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="alert alert-danger"><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label for="name" class="col-lg-12 control-label">Name</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="name_category" name="name_category">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="/Laravel/blog/public/admin/categories" type="reset" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-12">
            <a href="/Laravel/blog/public/admin/dashboard" class="btn btn-success">Torna alla dashboard</a>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\blog\resources\views/backend/post/categories/create.blade.php ENDPATH**/ ?>