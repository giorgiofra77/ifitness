<?php if(session('status')): ?>
    <div class="card-footer mb-0 alert alert-<?php echo e(session('alert_type')); ?> alert-dismissible text-center fade show"
        role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php echo e((session('status'))); ?>

    </div>
<?php endif; ?>
<?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/components/alert.blade.php ENDPATH**/ ?>