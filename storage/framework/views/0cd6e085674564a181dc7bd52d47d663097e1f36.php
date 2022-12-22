
<?php $__env->startSection('judul'); ?>
    Manage Categories
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container vh-100 py-5">
        <div class="col-md-6 p-4 shadow-sm rounded">
            <h2>Manage Categories</h2>
            <hr>
            <?php if(session()->has('message')): ?>
                <div class="alert alert-success"><?php echo e(session()->get('message')); ?></div>
            <?php endif; ?>
            <a href="<?php echo e(route('category.create')); ?>" class="btn btn-info my-2">Add Category</a>
            <?php if(count($categories) != 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($category->name); ?></td>
                                <td>
                                    <a href="<?php echo e(route('category.edit', $category->id)); ?>"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="<?php echo e(route('category.destroy', $category->id)); ?>" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();
                                         document.getElementById('delete-category-form-<?php echo e($category->id); ?>').submit();">
                                        Delete
                                        <form id="delete-category-form-<?php echo e($category->id); ?>"
                                            action="<?php echo e(route('category.destroy', $category->id)); ?>" method="POST"
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jobs\dolanesia\resources\views/category/index.blade.php ENDPATH**/ ?>