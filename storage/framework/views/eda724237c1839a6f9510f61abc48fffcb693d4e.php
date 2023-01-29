<!-- Modal cancellare utente -->
<form method="POST" action="<?php echo e(route('customers.destroy', $customer->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModal">Conferma eliminazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il cliente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-danger">Si! Elimina!</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/customers/deleteModal.blade.php ENDPATH**/ ?>