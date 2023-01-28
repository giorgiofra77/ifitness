<template>
<div>
  <div v-for="item in boxes">
    <div class="row mb-4">
      <div class="accordion col" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#acc' + item.id" aria-expanded="false" aria-controls="collapseTwo" v-text="item.box_name">
                  </button>
                </h2>
                <div :id="'acc' + item.id" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ol class="list-group list-group-numbered">
                      <li v-for="mtreatment in mtreatments" class="list-group-item">{{mtreatment.treatment_desc}}</li>
                    </ol>
                  </div>
                </div>
              </div>
      </div>
        <div class="col mt-2">
            <a class="btn btn-primary" data-bs-toggle="modal" :data-bs-target="'#treatmentModal' + item.id" href="#" title="Aggiungi un trattamento"><i class="bi bi-plus-square"></i></a>
            <a class="btn btn-danger" data-bs-toggle="modal" :data-bs-target="'#confirmDeleteModal' + item.id" href="#" title="Elimina il pacchetto"><i class="bi bi-trash-fill"></i></a>
        </div>
        <div class="modal fade" :id="'treatmentModal' + item.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserisci trattamento</h5>
                </div>
                <div class="modal-body">
                    <label class="mb-1">Trattamento *</label>
                    <input type="hidden" v-model="item.customer_id" name="customer_id">
                    <input type="hidden" v-model="item.id" name="box_id">
                    <select class="form-select" aria-label="Default select example" id="treatment_id" name="treatment_id" required>
                        <option v-model="selected" >Scegli il trattamento</option>
                        <option v-for="treatment in treatments" :value="treatment.id">
                        {{ treatment.desc }}
                        </option>
                    </select>
                </div>
                <div class="modal-footer">
                 <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                 <button type="button" @click="addTreatment" class="btn btn-primary">{{btName}}</button>
                </div>
            </div>
            </div>
        </div>
            <!-- Modal cancellare pacchetto -->
      </div>
    </div>
  </div>

</div>
</template>

<script>
    export default {
        props: ['boxes','tests'],
        data: function () {
          return {
            btName: 'Conferma',
            mtreatments: [{
              treatment_id: '',
              treatment_desc: '',
            }]

          }
        },
        methods:{
          addTreatment(){
            this.mtreatments.push({
              treatment_id: treatment.id,
              treatment_desc: treatment.desc,
            })
          },
        },
    }
</script>
