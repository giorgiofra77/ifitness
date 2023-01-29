<!-- Modal -->
<form method="POST" action="#" class="d-flex">
        <?php echo csrf_field(); ?>
        <div class="modal fade" id="addBoxeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aggiungi abbonamento</h5>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="box_name">Tipo abbonamento *</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['box_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('box_name')); ?>" id="box_name" name="box_name" required autofocus>
                    <input type="hidden" class="form-control" value="<?php echo e($customer->id); ?>" name="customer_id">
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputPrice">Prezzo € *</label>
                    <input type="number" step="0.01" class="form-control <?php $__errorArgs = ['box_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('box_price')); ?>" id="inputPrice" name="box_price" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputName">Note</label>
                    <textarea class="form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Note" name="box_note"></textarea>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Conferma</button>
                </div>
            </div>
            </div>
        </div>
</form>
<?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/subscriptions/addSubscriptionModal.blade.php ENDPATH**/ ?>