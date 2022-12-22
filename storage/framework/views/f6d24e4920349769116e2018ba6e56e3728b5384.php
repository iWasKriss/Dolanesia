

<?php $__env->startSection('judul'); ?>
    Explore - Dolanesia
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $destination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $des): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-3 mb-3">
                    <div class="card w-100 border-0 shadow-sm">
                        <img src="<?php echo e(asset('storage/destinations/' . $des->image)); ?>" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($des->name); ?></h5>
                            <p class="card-text fw-bold text-info">Rp. <?php echo e(number_format($des->price)); ?></p>
                            <p class="card-text"><?php echo e(substr($des->about, 0, 90)); ?>...</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="card-text">
                                        <b>Phone</b>
                                        <span class="d-block"><?php echo e($des->phone); ?></span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text">
                                        <b class="d-block">Ticket Stock</b>
                                        <?php if($des->ticket != 0): ?>
                                            <span><?php echo e($des->ticket); ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">sold out</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                            <p class="card-text mt-3">
                                <b>Category</b>
                                <span class="d-block"><?php echo e($des->category->name); ?></span>
                            </p>
                            <p class="card-text">
                                <b>Address</b>
                                <span class="d-block"><?php echo e(substr($des->address, 0, 40)); ?>...</span>
                            </p>

                            <a href="<?php echo e(route('destination.show', $des->id)); ?>" class="btn btn-success w-100">Show
                                Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="bg-warning text-dark p-2 rounded">Data is empty</div>
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jobs\dolanesia\resources\views/explore.blade.php ENDPATH**/ ?>