<!-- Modal -->

<form method="POST" action="" class="d-flex">
    @csrf
        <div class="modal fade" data-bs-focus="true" id="sellModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ricerca</h5>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputFind">Ricerca prodotto</label>
                    <input type="search" class="form-control @error('find') is-invalid @enderror" value="{{ old('find') }}" id="inputFind" name="find">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-success">Ricerca</button>
                </div>
            </div>
            </div>
        </div>
</form>
