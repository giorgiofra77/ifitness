<ul class="nav nav-pills card-header-pills justify-content-end">
    <li class="nav-item">

    <li class="nav-item">

        <a class="btn btn-danger me-2" href="<?php echo e(route('customers.index')); ?>" role="button"><i
                class="bi bi-backspace me-1"></i><?php echo e(__('messages.back')); ?></a>
        <button type="button" class="btn btn-outline-success me-2 dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
            <i class="bi bi-clipboard2-pulse-fill me-1"></i>Valori
        </button>

        <ul class="dropdown-menu">
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#testModal" href="#"><i
                        class="bi bi-plus-lg me-1"></i>Nuovo test</a></li>
            <li><a class="dropdown-item" href="<?php echo e(route('test-customer.index', $customer->id)); ?>"><i
                        class="bi bi-list-task me-1"></i>Test eseguiti</a></li>
            <li><a class="dropdown-item" href="<?php echo e(route('customer.powerzone', $customer->id)); ?>"><i class="bi bi-bar-chart-fill me-1"></i>Zone</a></li>
        </ul>
        <button type="button" class="btn btn-outline-primary me-2 dropdown-toggle text-dark-lite"
                data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo e(__('Abbonamenti')); ?>

        </button>
        <ul class="dropdown-menu me-2">
            <li><a class="dropdown-item" href="<?php echo e(route('customer.subscription.create', $customer->id)); ?>"><i
                        class="bi bi-person-vcard me-1"></i>Nuovo</a></li>
            <li><a class="dropdown-item" href="<?php echo e(route('customer.subscription.index', $customer->id)); ?>"><i
                        class="bi bi-list-task me-1"></i>Abbonamenti fatti</a></li>
        </ul>

    </li>
    
    <?php echo $__env->make('customers.addTestModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('subscriptions.addSubscriptionModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <li class="nav-item">
        <a href="<?php echo e(route('customers.edit', $customer->id)); ?>" class="btn btn-outline-primary me-2"><i
                class="bi bi-pencil-square"></i></a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customers.destroy', $customer->id)); ?>" class="btn btn-outline-danger me-2" role="button"
           aria-disabled="true" data-bs-toggle="modal" data-bs-target="#confirmModal"><i class="bi bi-trash"></i></a>
    </li>
</ul>
<?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/customers/nav.blade.php ENDPATH**/ ?>