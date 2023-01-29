<?php $__env->startSection('content'); ?>

    <div class="card text-left">
        <div class="card-header container">
            <?php echo $__env->make('customers.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <?php echo $__env->make('customers.deleteModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card text-dark mb-3">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo e($customer->fullName ?? ''); ?></h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h6><?php echo e(__('messages.address')); ?></h6> <?php echo e($customer->address ?? ''); ?> -
                                    <?php echo e($customer->zip); ?> - <?php echo e($customer->city); ?> - <?php echo e($customer->state); ?></li>
                                <li class="list-group-item"><h6><?php echo e(__('messages.email')); ?></h6> <?php echo e($customer->email); ?></li>
                                <li class="list-group-item">
                                    <h6><?php echo e(__('Data di nascita')); ?></h6><?php if($customer->birthday || null): ?>
                                        <?php echo \Carbon\Carbon::createFromDate($customer->birthday)->format('d/m/Y'); ?>
                                    <?php endif; ?></li>
                                <li class="list-group-item">
                                    <h6><?php echo e(__('messages.card_number')); ?></h6> <?php echo e($customer->card_number); ?></li>
                                <li class="list-group-item"><h6><?php echo e(__('messages.sport')); ?></h6> <?php echo e($customer->sport); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="card mb-3 bg-light">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-postcard-heart me-2"></i>Abbonamento</h5>
                            <?php $__empty_1 = true; $__currentLoopData = $customer->subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if(!$subscription->pivot->is_expired): ?>
                                    <p class="card-text px-3 py-3 rounded-3" style="background: #a7f815"><?php echo e($subscription->descr ?? ''); ?>

                                        fino al <?php echo \Carbon\Carbon::createFromDate($subscription->pivot->date_end)->format('d/m/Y'); ?></p>
                                    <?php if( (\Carbon\Carbon::createFromDate(today())
                                                ->diffInDays($subscription->pivot->date_end)) <= 30): ?>
                                        <p class="card-text bg-warning px-3 py-3 rounded-3">In scadenza
                                            tra <?php echo e(\Carbon\Carbon::createFromDate(today())->diffInDays($subscription->pivot->date_end)); ?>

                                            giorni <a class="link-primary" href="<?php echo e(route('customer.subscription.update',[$subscription->pivot->id])); ?>">Rinnova</a> </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="card-text">Nessun abbonamento o scaduto</p>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="card text-dark bg-light bg-opacity-50 mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-cash-coin me-2"></i>Ricavi abbonamenti</h5>
                            <p class="card-text">Quest'anno:
                                € <?php echo e(\App\Models\SubscriptionCustomer::getYearSum($customer->id) ?? ''); ?></p>
                            <p class="card-text">Di sempre:
                                € <?php echo e($customer->subscriptions->sum('price') ?? ''); ?></p>
                        </div>
                    </div>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                </div>

                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-card-checklist me-2"></i>Note</h5>
                        <p class="card-text"><?php echo e($customer->note); ?></p>
                    </div>
                </div>

            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/customers/show.blade.php ENDPATH**/ ?>