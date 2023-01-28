<!-- Modal -->
<form method="POST" action="{{route('test.store')}}" class="d-flex">
    @csrf
        <div class="modal fade" id="testModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserisci dati Test</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="{{$customer->id}}" name="customer_id">
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputName">Data Test</label>
                    <input type="date" class="form-control @error('date_test') is-invalid @enderror" value="{{ \Carbon\Carbon::create(today())->format('d/m/Y') }}" name="date_test" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputProd">Peso atleta (Kg)</label>
                    <input type="number" step="1" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}" name="weight" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputProd">Watt alla soglia</label>
                    <input type="number" step="1" class="form-control @error('threshold_watt') is-invalid @enderror" value="{{ old('threshold_watt') }}" name="threshold_watt" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputPrice">Watt massimali</label>
                    <input type="number" step="1" class="form-control @error('max_watt') is-invalid @enderror" value="{{ old('max_watt') }}" name="max_watt" required>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputName">Note</label>
                    <input type="text" class="form-control @error('note_test') is-invalid @enderror" value="{{ old('note_test') }}" name="note_test">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Conferma</button>
                </div>
            </div>
            </div>
        </div>
</form>
