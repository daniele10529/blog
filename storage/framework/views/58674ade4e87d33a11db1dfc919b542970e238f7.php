<?php $__env->startSection('title', $post->title); ?>
<?php $__env->startSection('content'); ?>
<header class="masthead" style="background-image: url(<?php echo e(url('/img/post-bg.jpg')); ?>);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1><?php echo e($post->title); ?></h1>
                        <span class="subheading">
                            <p class="post-meta">Posted by daam Development Soft°
                            on <?php echo e($post->created_at->format('d-m-Y')); ?> <br>
                            Categories:<?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($category->name_category); ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <article>
        <div class="container">
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($img->post_id === $post->id): ?>
                    <div class="container-fluid">
                        <div class="row">
                            <ul class="nav">
                                <li><img src="<?php echo e($img->title); ?>" class="img-thumbnail row-cols-xl-6" style="width: 250px; height: 250px;" alt=""></li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="card-body text-justify">
                    <p><?php echo nl2br(e($post->content)); ?></p>
                </div>
                <div class="clearfix"></div>
            </div>

            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-8 col-md-10 mx-auto card mb-4">
                    <div class="card-body">
                        <blockquote><?php echo e($comment->content); ?></blockquote>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-8 col-md-10 mx-auto card">
                <div class="card-body">
                    <form method="post" action="/Laravel/blog/public/comments">

                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="alert alert-danger"><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                        <input type="hidden" name="post_type" value="App\Models\Post">
                        <div class="form-group">
                            <legend>Comment</legend>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <a href="#" type="reset" class="btn btn-warning">Cancel</a>
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\blog\resources\views/blog/show.blade.php ENDPATH**/ ?>