<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-2">
    <div class="position-sticky pt-3 list-group">
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('homepage.index')); ?>">
                <i class="bi bi-house-door-fill me-1"></i>
                <?php echo e(__('messages.home')); ?>

            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('customers.index')); ?>">
                <i class="bi bi-people-fill me-1"></i>
                <?php echo e(__('messages.customers')); ?>

            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('subscriptions.index')); ?>">
                <i class="bi bi-postcard me-1"></i>
                <?php echo e(__('messages.subscriptions')); ?>

            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('allsub')); ?>" role="link" aria-expanded="false">
                <i class="bi bi-card-heading me-2"></i>Iscrizioni</a>
            </li>

            <?php if(auth()->guard()->check()): ?>
                <li class="nav-item">

                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false">
                    <i class="bi bi-person-workspace me-2"></i><?php echo e(Auth::user()->name); ?></a>
                <ul class="dropdown-menu">
                    <?php if(Auth::user()->is_admin): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('users.index')); ?>"><i
                                    class="bi bi-people-fill me-1"></i>
                                <?php echo e(__('Utenti')); ?></a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-left me-1"></i>
                            <?php echo e(__('Uscita')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                </ul>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/components/sidebar.blade.php ENDPATH**/ ?>