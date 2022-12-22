<?php $__env->startSection('judul'); ?>
    Home - Dolanesia
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="display-4 fw-bold mb-3">Welcome to Dolanesia</h1>
            <a href="<?php echo e(url('/explore')); ?>" class="btn border-dark">Explore Destinations</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jobs\dolanesia\resources\views/home.blade.php ENDPATH**/ ?>