@extends('template.app')
@section('content')

<div class="card text-left">
    <div class="card-header container">@include('boxes.navdetail')</div>
      <div class="card-body">
        <div class="fs-4 mb-2 d-flex justify-content-center">
          {{$customer->name}} {{$customer->lastname}}
        </div>
        @if (session('status'))
          <div class="card-footer mb-0 alert alert-success alert-dismissible text-center fade show" role="alert" >
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          {{ (session('status')) }}
          </div>
        @endif
        <div class="row row-cols-auto">
            <div class="col-12">
              <div class="card text-dark mb-1">
                <div class="card-body">
                  @isset($boxeTreatments)
                  @if (count($boxeTreatments) > 0)
                    <table class="table col-8">
                      <thead>
                        <tr class="bg-info">
                          <th class="fs-4" colspan="4">{{$boxe->box_name}} € {{$boxe->box_price}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($boxeTreatments as $item)
                        <tr>
                          <th class="col-1">{{$loop->iteration}}</th>
                          <td class="col-8 fs-5 {{($item->completed) ? 'text-decoration-line-through' : ''}}">{{$item->treatment->desc}}</td>
                          <td class="col-2">
                            <form method="POST" action="{{ route('boxetreatment.update', $item->id) }}">
                              @csrf
                              @method('patch')
                            <div class="input-group mb-3">
                              <input type="number" class="form-control form-control-sm" placeholder="" value="{{$item->price}}" name="price" {{($item->completed) ? 'disabled' : ''}}>
                              <input type="hidden" class="form-control form-control-sm" value="{{$item->id}}" name="id">
                              <input type="hidden" class="form-control form-control-sm" value="{{$item->customer_id}}" name="customer_id">
                              <input type="hidden" class="form-control form-control-sm" value="{{$item->treatment_id}}" name="treatment_id">
                              <button {{($item->completed) ? 'disabled' : ''}} class="btn btn-outline-success" title="Completa trattamento" type="submit" onclick="return confirm('Confermi il trattamento fatto?')" id="button-addon1"><i class="bi bi-check-circle-fill"></i></button>
                            </div>
                            </form>
                          </td>
                          <td class="text-end">
                            <div class="col-auto">
                              <form id="deleteForm" method="POST" id="formDelete" action="{{ route('boxetreatment.destroy', $item->id) }}">
                              @csrf
                              @method('delete')
                              <button onclick="return confirm('Confermi la cancellazione?')" type="submit" title="Cancella trattamento" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                              </form>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        <tr colspan="4">
                          <td colspan="4" class="text-end">Importo incassato: € {{$get_sum_price}}</td>
                        </tr>
                        <tr colspan="4" class="fs-5 card-footer">
                          <td colspan="4" class="text-end">Importo da incassare: € {{($boxe->box_price - $get_sum_price)}}</td>
                        </tr>
                      </tbody>
                    </table>
                    @else
                      <div class="card-text text-center">
                        <p class="fs-4 bg-info">{{$boxe->box_name}}</p>
                        ora puoi aggiungere i trattamenti
                      </div>
                    @endif
                    @endisset
                </div>
              </div>
            </div>
      </div>
    </div>
</div>
@include('boxes.deletemodal')
@include('boxes.addtreatmentmodal')
@include('boxes.modifyBoxModal')
@endsection
