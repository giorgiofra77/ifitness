<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-header">Dati aziendali</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(Auth::user()->account->ragsociale); ?></h5>
                    <p class="card-text"><?php echo e(Auth::user()->account->fulladdress); ?></p>
                    <p class="card-text"><?php echo e(Auth::user()->account->email); ?></p>
                    <a href="<?php echo e(route('account.edit', Auth::user()->account->id)); ?>" class="btn btn-primary">Modifica</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Compleanni di oggi</div>
                <div class="card-body">
                    <?php if(isset($customers)): ?>
                        <?php if(count($customers) > 0): ?>

                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="card-text border-bottom">
                                <?php echo e($customer->name); ?> <?php echo e($customer->lastname); ?>

                                <span class="badge bg-primary rounded-pill position-absolute end-0 me-1"><?php echo e(\Carbon\Carbon::create($customer->birthday)->diffInYears('now')); ?> <?php echo e(__('messages.years')); ?></span>
                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            Nessun compleanno
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed-bottom text-center ms-sm-auto col-lg-10 bg-light p-3">Software sviluppato da Giorgio Franchini &#169;</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/dashboard.blade.php ENDPATH**/ ?>