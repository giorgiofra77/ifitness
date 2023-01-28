<template>
<!-- Modal -->
<form method="POST" action="/treatmentcustomer/store" class="d-flex">

    <div class="modal fade" id="treatmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inserisci trattamento</h5>
                </div>
                <div class="modal-body">
                    <label class="mb-1">Trattamento *</label>
                    <input type="hidden" :value="customer.id" name="customer_id">
                    <select class="form-select"  v-model="(treatment_price)" id="treatment_id" name="treatment_id" required>
                        <option selected value="">Scegli il trattamento</option>

                        <option v-for="treatment in treatments" :value="treatment.price" >{{treatment.desc}} € {{treatment.price}}</option>

                    </select>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputProd">Prodotti usati</label>
                    <input type="text" class="form-control" v-model="trattamentoScelto" id="inputProd" name="products">
                </div>
                <div class="modal-body ">
                    <label class="mb-1" for="inputPrice">Gratis</label>
                    <input class="form-check-input form-control form-control-lg" type="checkbox" value="1" id="flexCheckDefault" name="gratis">
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputPrice">Prezzo stabilito € (lasciare vuoto per prezzo standard)</label>
                    <input type="text" step="0.01" class="form-control" v-model="treatment_price" id="inputPrice" name="treatment_price">
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputAcconto">Acconto</label>
                    <input type="number" step="0.01" class="form-control" value="" id="inputAcconto" name="acconto">
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="inputNote">Note</label>
                    <input type="text" class="form-control" value="" id="inputNote" name="note">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary">{{confirm}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
</template>

<script>
export default {
    name: "AddTreatmentModal.vue",
    props:['customer', 'tests'],

    data: function(){
        return {
            confirm: 'Conferma',
            trattamentoScelto: '',
            treatment_price: '',
        }

    },
    methods:{
        onChange(price){
            return this.treatment_price = price;
    }

    },
}
</script>

<style scoped>

</style>
