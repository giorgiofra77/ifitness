<!-- Modal -->
<form method="POST" action="<?php echo e(route('test.store')); ?>" class="d-flex">
    <?php echo csrf_field(); ?>
        <div class="modal fade" id="testModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserisci dati Test</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="<?php echo e($customer->id); ?>" name="customer_id">
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputName">Data Test</label>
                    <input type="date" class="form-control <?php $__errorArgs = ['date_test'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(\Carbon\Carbon::create(today())->format('d/m/Y')); ?>" name="date_test" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputProd">Peso atleta (Kg)</label>
                    <input type="number" step="1" class="form-control <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('weight')); ?>" name="weight" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputProd">Watt alla soglia</label>
                    <input type="number" step="1" class="form-control <?php $__errorArgs = ['threshold_watt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('threshold_watt')); ?>" name="threshold_watt" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputPrice">Watt massimali</label>
                    <input type="number" step="1" class="form-control <?php $__errorArgs = ['max_watt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('max_watt')); ?>" name="max_watt" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputName">Note</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['note_test'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('note_test')); ?>" name="note_test">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Conferma</button>
                </div>
            </div>
            </div>
        </div>
</form>
<?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/customers/addTestModal.blade.php ENDPATH**/ ?>