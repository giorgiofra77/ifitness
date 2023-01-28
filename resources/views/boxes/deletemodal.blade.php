<!-- Modal cancellare pacchetto -->
<form method="POST" action="{{route('boxes.destroy', $boxe->id)}}">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirmModal">Conferma completamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Confermi completamento del pacchetto?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
            <button type="submit" class="btn btn-danger">Si! Completa!</button>
        </div>
        </div>
    </div>
    </div>
</form>