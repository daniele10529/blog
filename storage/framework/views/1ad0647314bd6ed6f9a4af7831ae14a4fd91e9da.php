<?php $__env->startSection('title','Posts'); ?>
<?php $__env->startSection('content'); ?>
<header class="masthead" style="background-image: url(<?php echo e(url('img/dashboard.jpg')); ?>)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Modifica i tuoi posts</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">Edit a post</h5>
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
                    <label for="title" class="col-lg-12 control-label">Title</label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?php echo e($post->title); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-lg-12 control-label">Content</label>
                    <div class="col-lg-12">
                        <textarea class="form-control" rows="3" id="content" name="content"><?php echo e($post->content); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="categories" class="col-lg-12 control-label">Categories</label>

                    <div class="col-lg-12">
                        <select class="form-control" id="category" name="categories[]" multiple>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"  <?php if(in_array($category->id, $selectedCategories)): ?>
                                selected="selected" <?php endif; ?> ><?php echo e($category->name_category); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a href="/Laravel/blog/public/admin/posts" type="reset" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
             <hr>
                <div class="col-lg-12">
                    <h4>Immagine</h4>
                    <?php $__currentLoopData = $post->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e($image->title); ?>" alt="<?php echo e($image->slug); ?>" class="img-thumbnail" style="width: 120px;height: auto;">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <form class="form-group" action="<?php echo e(route('image.upload.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control">
                                <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                            </div>

                            <div class="col-md-6">
                                <a href="/Laravel/blog/public/admin/posts/create" type="reset" class="btn btn-warning">Cancel</a>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>
        <div class="card mt-12">
            <a href="/Laravel/blog/public/admin/dashboard" class="btn btn-success">Torna alla dashboard</a>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\blog\resources\views/backend/post/edit.blade.php ENDPATH**/ ?>