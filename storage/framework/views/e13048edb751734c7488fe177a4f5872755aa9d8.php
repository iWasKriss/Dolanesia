
<?php $__env->startSection('judul'); ?>
    Transaction History
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container vh-100 py-5">
        <div class="col-md-9 p-4 shadow-sm rounded">
            <h2>Transaction Histories</h2>
            <hr>
            <?php if(session()->has('message')): ?>
                <div class="alert alert-success"><?php echo e(session()->get('message')); ?></div>
            <?php endif; ?>
            <?php if(count($histories) != 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tourist</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Total Cost</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col" style="width: 20%" class="text-center">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td>
                                    <span class="fw-bold d-block"><?php echo e($history->user->name); ?></span>
                                    <a href="#" class="text-sm fw-bold"><?php echo e($history->user->email); ?></a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('destination.show', $history->destination_id)); ?>"
                                        class="fw-bold text-decoration-none">
                                        <?php echo e($history->destination->name); ?>

                                    </a>
                                    <span class="d-block">Total Ticket: <?php echo e($history->ticket_qty); ?></span>
                                </td>
                                <td>Rp. <?php echo e(number_format($history->subtotal)); ?></td>
                                <td><?php echo e($history->created_at); ?></td>
                                <td class="text-center">
                                    
                                    <img src="<?php echo e(asset('img/paid.png')); ?>" alt="paid" class="w-50">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jobs\dolanesia\resources\views/history.blade.php ENDPATH**/ ?>