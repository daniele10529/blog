<?php $__env->startSection('title','Gestisci permessi'); ?>
<?php $__env->startSection('content'); ?>
<header class="masthead" style="background-image: url(<?php echo e(url('img/about-bg.jpg')); ?>)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Permessi</h1>
                        <span class="subheading">Gestisci i permesi utente</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container col-md-6 col-md-offset-3">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="float-left">Edit user</h5>
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

                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <label for="name" class="col-lg-12 control-label">Name</label>

                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                   value="<?php echo e($user->name); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-lg-12 control-label">Email</label>

                        <div class="col-lg-12">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                   value="<?php echo e($user->email); ?>">
                        </div>
                    </div>
					 <div class="form-group">
                        <label for="select" class="col-lg-12 control-label">Role</label>

                        <div class="col-lg-12">
                            <select class="form-control" id="role" name="role[]" multiple>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->name); ?>"  <?php if(in_array($role->name, $selectedRoles)): ?>
                                    selected="selected" <?php endif; ?> ><?php echo e($role->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-12 control-label">Password</label>

                        <div class="col-lg-12">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-12 control-label">Confirm password</label>

                        <div class="col-lg-12">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="/Laravel/blog/public/admin/user" type="reset" class="btn btn-warning">Cancel</a>
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

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\blog\resources\views/backend/users/edit.blade.php ENDPATH**/ ?>