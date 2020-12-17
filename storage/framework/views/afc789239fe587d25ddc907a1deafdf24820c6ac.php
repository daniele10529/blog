<?php $__env->startSection('title','Posts'); ?>
<?php $__env->startSection('content'); ?>
<header class="masthead" style="background-image: url(<?php echo e(url('img/dashboard.jpg')); ?>)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Visualizza i tuoi posts</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="float-left">All posts</h5>
                <div class="clearfix"></div>
            </div>
            <div class="content">
                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <?php if($posts->isEmpty()): ?>
                    <p> There is no post.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($post->id); ?></td>
                                    <td>
                                        <a href="<?php echo e(action('App\Http\Controllers\Admin\Posts\PostsController@edit',$post->id)); ?>"><?php echo e($post->title); ?> </a>
                                    </td>
                                    <td><?php echo e($post->slug); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($category->name_category); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e($post->created_at); ?></td>
                                    <td><?php echo e($post->updated_at); ?></td>
                                    <td>
                                        <a href="<?php echo e(action('App\Http\Controllers\Admin\Posts\PostsController@destroy',$post->id)); ?>" onclick="return confirm('Sei sicuro di voler eliminare il post : <?php echo e($post->title); ?> ?')">
                                          <i class="fas fa-trash-alt" style="color: orangered;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(action('App\Http\Controllers\Admin\ImageUploadController@index', $post->id)); ?>">
                                            <i class="fa fa-file-image"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
				</div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\blog\resources\views/backend/post/index.blade.php ENDPATH**/ ?>