<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>
<header class="masthead" style="background-image: url(<?php echo e(url('img/home-bg.jpg')); ?>)">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Daam web site</h1>
            <span class="subheading">The daam Laravel blog</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post-preview">
          <a href="<?php echo e(action('App\Http\Controllers\PagesController@show',$post->slug)); ?>">
            <h2 class="post-title">
              <?php echo e($post->title); ?>

            </h2>
            <h3 class="post-subtitle">
              <?php echo e(Str::limit($post->content,100)); ?>

            </h3>
          </a>

            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($img->post_id === $post->id): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="<?php echo e($img->title); ?>" class="img-fluid" style="width: 50px; height: 50px;" alt="">
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <p class="post-meta">Posted by <?php echo e($post->users->name); ?>

            on <?php echo e($post->created_at->format('d-m-Y')); ?>

            Categoria : <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($category->name_category); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </p>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <hr>
        <!-- Pager -->
        <div class="col-lg-8">

        </div>
      </div>
    </div>

  </div>

  <hr>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\blog\resources\views/home.blade.php ENDPATH**/ ?>