<?php $__env->startSection('content'); ?>
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center h5">Iscrizioni attive dei clienti</div>
                <div class="card-body">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a href="<?php echo e(route('allsub')); ?>" class="btn btn-primary me-1" role="button" aria-disabled="true" title="<?php echo e(__('Abbonamenti')); ?>"><i class="bi bi-postcard me-1"></i><?php echo e(__('Abbonamenti')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('allsubunder')); ?>" class="btn btn-warning me-1" role="button" aria-disabled="true" title="<?php echo e(__('Abbonamenti in scadenza')); ?>"><i class="bi bi-postcard me-1"></i><?php echo e(__('In scadenza')); ?></a>
                        </li>
                    </ul>
                    <?php if(isset($customers) && count($customers) > 0): ?>
                        <table class="table mt-2">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Cognome</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-light">
                                    <td><?php echo e($c->name); ?></td>
                                    <td><?php echo e($c->lastname); ?></td>
                                    <th>Abbonamenti</th>
                                    <th>Scadenza</th>
                                </tr>
                                    <?php $__currentLoopData = $c->subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="border-bottom-0 border-white
                                                 <?php if( ($s->pivot->is_under)): ?> bg-warning <?php endif; ?>">
                                                <td></td>
                                                <td></td>
                                                <td><a href="<?php echo e(route('customers.show', $c->id)); ?>" ><?php echo e($s->descr); ?></a></td>
                                                <td><a href="<?php echo e(route('customers.show', $c->id)); ?>"><?php echo \Carbon\Carbon::createFromDate($s->pivot->date_end)->format('d/m/Y'); ?></a></td>
                                            </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>
                    <?php else: ?>
                        <div class="d-flex justify-content-center h4">Nulla da segnalare</div>
                    <?php endif; ?>
                </div>
                <div class="card-footer d-flex justify-content-center py-3">
                    <?php echo e($customers->links()); ?>

                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/subscriptions/subscriptioncustomer.blade.php ENDPATH**/ ?>