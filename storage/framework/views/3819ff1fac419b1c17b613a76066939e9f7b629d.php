<?php $__env->startSection('content'); ?>

<div class="row justify-content-left">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Gestione clienti</div>
        <div class="card-body">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a href="<?php echo e(route('customers.index', 'all=true')); ?>" class="btn btn-outline-primary me-2" role="button" aria-disabled="true"><i class="bi bi-people-fill me-1"></i><?php echo e(__('messages.all')); ?></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-outline-primary me-2" role="button" aria-disabled="true"><i class="bi bi-person-plus-fill me-1"></i><?php echo e(__('messages.add')); ?></a>
            </li>
            <li class="nav-item">
                <form method="POST" action="<?php echo e(route('customer.find')); ?>" class="d-flex mb-lg-5">
                  <?php echo csrf_field(); ?>
                  <input class="form-control me-2" minlength="3" type="search" placeholder="<?php echo e(__('messages.name')); ?> o <?php echo e(__('messages.lastname')); ?>" aria-label="Search" name="find" required autofocus>
                    <?php $__errorArgs = ['find'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <button class="btn btn-outline-success" type="submit"><?php echo e(__('messages.search')); ?></button>
                </form>
            </li>
          </ul>

          <?php if(isset($customers)): ?>
              <?php if(count($customers) > 0): ?>
                    <?php echo $__env->renderEach('customers.listgroup', $customers, 'customer'); ?>
                    <?php if(!isset($nopaginate)): ?>
                      <div class="d-flex justify-content-center mt-2">
                        <?php echo e($customers->appends(['all' => 'true'])->links()); ?>

                      </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="d-flex justify-content-center mt-5 fs-3">Archivio clienti vuoto</div>
                <?php endif; ?>
          <?php endif; ?>
        </div>


      <?php if(session('status')): ?>
        <div class="card-footer mb-0 alert alert-danger alert-dismissible text-center fade show" role="alert" >
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php echo e((session('status'))); ?>

        </div>
      <?php endif; ?>


    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/customers/index.blade.php ENDPATH**/ ?>