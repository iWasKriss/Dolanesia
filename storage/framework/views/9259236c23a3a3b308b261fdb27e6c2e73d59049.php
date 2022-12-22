

<?php $__env->startSection('judul'); ?>
    Destination Detail - Dolanesia
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-6 m-auto py-5">
        <div class="card">
            <div class="card-header">
                Destination Detail
            </div>
            <div class="card-body">
                <img src="<?php echo e(asset('/storage/destinations/' . $destination->image)); ?>" class="w-100 mb-3" alt="image">
                <?php if(session()->has('error_message')): ?>
                    <div class="alert alert-danger"><?php echo e(session()->get('error_message')); ?></div>
                <?php endif; ?>
                <h5 class="card-title"><?php echo e($destination->name); ?></h5>
                <h5 class="text-info mb-3">Rp. <?php echo e(number_format($destination->price)); ?></h5>
                <div class="row">
                    <div class="col-md-4">
                        <p class="card-text">
                            <b>Category</b>
                            <span class="d-block"><?php echo e($destination->category->name); ?></span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="card-text">
                            <b class="d-block">Ticket Stock</b>
                            <?php if($destination->ticket != 0): ?>
                                <span><?php echo e($destination->ticket); ?></span>
                            <?php else: ?>
                                <span class="badge bg-danger">sold out</span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="card-text">
                            <b>Phone</b>
                            <span class="d-block"><?php echo e($destination->phone); ?></span>
                        </p>
                    </div>
                </div>
                <p class="card-text mt-3">
                    <b>Address</b>
                    <span class="d-block"><?php echo e($destination->about); ?></span>
                </p>

                <?php if($destination->ticket != 0): ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <a href="/login" class="btn btn-success w-100">Buy
                            Ticket</a>
                    <?php else: ?>
                        <?php if(Auth::user()->status == 'tourist'): ?>
                            <a href="#" class="btn btn-success w-100" data-bs-toggle="modal"
                                data-bs-target="#buyTicket">Buy
                                Ticket</a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="#" class="btn btn-secondary w-100">Sold Out</a>
                <?php endif; ?>

                <div class="modal fade" id="buyTicket" tabindex="-1" aria-labelledby="buyTicketLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('checkout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="buyTicketLabel">Buy Ticket</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="d-none" name="destination" value=<?php echo e($destination->id); ?>>
                                    <div class="mb-3">
                                        <label for="ticket_qty" class="form-label">Ticket Total</label>
                                        <input type="number" name="ticket_qty"
                                            class="form-control <?php $__errorArgs = ['ticket_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ticket_qty"
                                            placeholder="Enter the number of tickets" value="<?php echo e(old('ticket_qty')); ?>">
                                        <?php $__errorArgs = ['ticket_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Checkout</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jobs\dolanesia\resources\views/destination/show.blade.php ENDPATH**/ ?>