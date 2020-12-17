<?php $__env->startSection('title','Insert Image'); ?>
<?php $__env->startSection('content'); ?>
    <header class="masthead" style="background-image: url(<?php echo e(url('img/dashboard.jpg')); ?>)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Insert Image</h1>
                        <span class="subheading">Insert Image</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">

        <div class="panel panel-primary">
            <div class="panel-heading"><h2>Inserisci la Thumbnail</h2></div>
            <div class="panel-body">

                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <img src="images/<?php echo e(Session::get('image')); ?>">
                <?php endif; ?>

                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(action('App\Http\Controllers\Admin\ImageUploadController@store',$id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <a href="/Laravel/blog/public/admin/posts/create" type="reset" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>

                    </div>
                </form>
                <hr>
                    <div class="card mt-12">
                        <a href="/Laravel/blog/public/admin/dashboard" class="btn btn-success">Torna alla dashboard</a>
                    </div>
                    <hr>
                    <div class="card mt-12">
                        <a href="/Laravel/blog/public/admin/posts" class="btn btn-info">Torna alla lista post</a>
                    </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\blog\resources\views/backend/image/image-upload.blade.php ENDPATH**/ ?>