<!-- Modal -->
<form method="POST" action="{{ route('boxetreatment.store') }}" class="d-flex">
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
                    <input type="hidden" value="{{$boxe->id}}" name="boxe_id">
                    <select class="form-select mb-3" aria-label="Default select example" id="treatment_id" name="treatment_id" required>
                            <option selected value="">Scegli il trattamento</option>
                        @foreach ($treatments as $treatment)
                            <option value="{{$treatment->id}}">{{$treatment->desc}} € {{$treatment->price}}</option>
                        @endforeach                
                    </select>
                        <label for="exampleInputPrice" class="form-label">Prezzo trattamento *</label>
                        <input type="number" step="0.01" class="form-control mb-3" id="exampleInputPrice" name="price" value="0" required>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Conferma</button>
                </div>
            </div>
        </div>
    </div>
</form>
