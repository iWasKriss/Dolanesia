
<?php $__env->startSection('judul'); ?>
    Manage Destination
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="col-md-12 p-4 shadow-sm rounded">
            <h2>Manage Destinations</h2>
            <hr>
            <?php if(session()->has('message')): ?>
                <div class="alert alert-success"><?php echo e(session()->get('message')); ?></div>
            <?php endif; ?>
            <a href="<?php echo e(route('destination.create')); ?>" class="btn btn-info my-2">Add Destination</a>
            <?php if(count($destination) != 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" style="width: 15%">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Ticket Total</th>
                            <th scope="col">Price</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">About</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $destination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $des): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><img src="<?php echo e(asset('storage/destinations/' . $des->image)); ?>" alt="image"
                                        class="w-100">
                                </td>
                                <td><?php echo e($des->name); ?></td>
                                <td>
                                    <?php if($des->ticket != 0): ?>
                                        <span class="d-block"><?php echo e($des->ticket); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">sold out</span>
                                    <?php endif; ?>
                                </td>
                                <td>Rp. <?php echo e(number_format($des->price)); ?></td>
                                <td><?php echo e($des->address); ?></td>
                                <td><?php echo e($des->phone); ?></td>
                                <td><?php echo e(substr($des->about, 0, 90)); ?>...</td>
                                <td>
                                    <a href="<?php echo e(route('destination.edit', $des->id)); ?>"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="<?php echo e(route('destination.destroy', $des->id)); ?>" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();
                                         document.getElementById('delete-destination-form-<?php echo e($des->id); ?>').submit();">
                                        Delete
                                        <form id="delete-destination-form-<?php echo e($des->id); ?>"
                                            action="<?php echo e(route('destination.destroy', $des->id)); ?>" method="POST"
                                            class="d-none">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="bg-warning text-dark p-2 rounded">Data is empty</div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jobs\dolanesia\resources\views/destination/index.blade.php ENDPATH**/ ?>