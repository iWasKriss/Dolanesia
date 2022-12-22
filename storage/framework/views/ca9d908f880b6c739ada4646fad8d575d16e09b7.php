<nav class="navbar navbar-expand-lg navbar-light shadow-sm p-md-2">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">DOLANESIA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="/explore">Explore</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>

                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="/history">Transaction</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?>

                            <?php if(Auth::user()->status == 'admin'): ?>
                                ✅
                            <?php endif; ?>
                        </a>


                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <?php if(Auth::user()->status == 'admin'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('category.index')); ?>">
                                    Manage Categories
                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('destination.index')); ?>">
                                    Manage Destinations
                                </a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>


            </ul>
        </div>
    </div>
</nav>
<?php /**PATH D:\Jobs\dolanesia\resources\views/partials/navbar.blade.php ENDPATH**/ ?>