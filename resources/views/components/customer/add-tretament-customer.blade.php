<!-- Modal -->
<form method="POST" action="{{ route('treatmentcustomer.store') }}" class="d-flex">
    @csrf
        <div class="modal fade" id="treatmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserisci trattamento</h5>
                </div>
                <div class="modal-body">
                    <label class="mb-1">Trattamento *</label>
                    <input type="hidden" value="{{$customer->id}}" name="customer_id">
                    <select v-model="selected" class="form-select" aria-label="Default select example" id="treatment_id" name="treatment_id" required>
                            <option selected value="">Scegli il trattamento</option>

                            <option @change="onChange()" v-for="treatment in treatments" :value="treatment.id">{{treatment.desc}}</option>

                    </select>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputProd">Prodotti usati</label>
                    <input type="text" class="form-control @error('prodotti') is-invalid @enderror" value="{{ old('prodotti') }}" id="inputProd" name="products">
                </div>
                <div class="modal-body ">
                    <label class="mb-1" for="inputPrice">Gratis</label>
                    <input class="form-check-input form-control form-control-lg" type="checkbox" value="1" id="flexCheckDefault" name="gratis">
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputPrice">Prezzo stabilito € (lasciare vuoto per prezzo standard)</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', 0) }}" id="inputPrice" name="treatment_price">
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputName">Acconto</label>
                    <input type="number" step="0.01" class="form-control @error('acconto') is-invalid @enderror" value="{{ old('acconto') }}" id="inputProf" name="acconto">
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputName">Note</label>
                    <input type="text" class="form-control @error('note') is-invalid @enderror" value="{{ old('note') }}" id="inputProf" name="note">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Conferma</button>
                </div>
            </div>
            </div>
        </div>
</form>