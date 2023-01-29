<?php $__env->startSection('content'); ?>
<div class="row justify-content-left">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Gestione Iscrizioni</div>
        <div class="card-body">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a href="<?php echo e(route('subscriptions.create')); ?>" class="btn btn-outline-primary me-1" role="button" aria-disabled="true" title="<?php echo e(__('messages.add')); ?>"><i class="bi bi-postcard me-1"></i><?php echo e(__('messages.add')); ?></a>
            </li>
          </ul>
          <?php if(isset($subscriptions) && count($subscriptions) > 0): ?>
            <table class="table mt-2">
              <thead>
                <tr>
                  <th scope="col">Codice</th>
                  <th scope="col">Descrizione</th>
                    <th scope="col">Prezzo €</th>
                  <th scope="col">Durata Mesi</th>
                  <th scope="col">&nbsp</th>
                </tr>
              </thead>

              <tbody>
                <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->code); ?></td>
                        <td><?php echo e($item->descr); ?></td>
                        <td><?php echo number_format($item->price, 2, ',', '.'); ?></td>
                        <td><?php echo e($item->months); ?></td>
                        <td><a class="btn btn-outline-primary" href="<?php echo e(route('subscriptions.edit', $item->id)); ?>" role="button"><i class="bi bi-pencil-square"></i></a></td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>

            </table>
            <?php else: ?>
            <div class="d-flex justify-content-center">Non sono inserite tipologie di abbonamento, clicca in alto per aggiungerne una.</div>
            <?php endif; ?>
        </div>


        <?php if(session('status')): ?>
            <div class='card-footer mb-0 alert alert-<?php echo e(session('alert_type')); ?> alert-dismissible text-center fade show' role="alert" >
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/subscriptions/index.blade.php ENDPATH**/ ?>