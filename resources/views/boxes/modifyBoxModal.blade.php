<!-- Modal -->
<form method="POST" action="{{ route('boxes.update', $boxe->id) }}" class="d-flex">
        @csrf
        @method('PATCH')
        <div class="modal fade" id="boxModifyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifica Pacchetto</h5>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="box_name">Nome pacchetto *</label>
                    <input type="hidden"value="{{$boxe->id}}" name="id">
                    <input type="text" class="form-control @error('box_name') is-invalid @enderror" value="{{$boxe->box_name}}" id="box_name" name="box_name" required autofocus>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputPrice">Prezzo € *</label>
                    <input type="number" step="0.01" class="form-control @error('box_price') is-invalid @enderror" value="{{$boxe->box_price}}" id="inputPrice" value="0" name="box_price" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputName">Note</label>
                    <textarea class="form-control @error('note') is-invalid @enderror" aria-label="Note" name="box_note">{{$boxe->box_note}}</textarea>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Aggiorna</button>
                </div>
            </div>
            </div>
        </div>
</form>
