@extends('template.app')

@section('content')

    <div class="card text-left">
      <div class="card-header container">
        <ul class="nav nav-pills card-header-pills justify-content-end">
          <li class="nav-item">
            <a class="btn btn-outline-danger me-2" href="{{ route('customers.sells', $sell->customer_id) }}"><i class="bi bi-backspace-fill me-1"></i>Indietro</a>
          </li>
          <li class="nav-item">
            <a href="#" class="btn btn-outline-danger me-2" role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#confirmModal"><i class="bi bi-trash"></i></a>
          </li>
        </ul>
      </div>

        <!-- Modal -->
        <form method="POST" action="{{ route('sells.destroy', $sell->id) }}">
            @csrf
            @method('DELETE')
          <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="confirmModal">Conferma eliminazione</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Sei sicuro di voler la vendita?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                  <button type="submit" class="btn btn-danger">Si! Elimina!</button>
                </div>
              </div>
            </div>
          </div>
        </form>

          <div class="card-body">

              <div class="row">

                <div class="col-sm-6">
                  <div class="card text-dark bg-light mb-3">
                    <div class="card-body text-left">
                      <h5 class="card-title">Dati ventita su {{$sell->customer->name}} {{$sell->customer->lastnamen}}<h5>
                      <p class="card-text">{{__('Codice')}}: {{ $sell->article->code}}</p>
                      <p class="card-text">{{__('Descrizione')}}: {{ $sell->article->code_desc }}</p>  
                      <p class="card-text">{{__('Prezzo vendita')}}: € {{ $sell->price_sell }}</p>     
                      <p class="card-text">{{__('Data vendita')}}: {{ \Carbon\Carbon::create($sell->created_at)->format('d/m/Y') }}</p>               
                    </div>
                  </div>
                </div>

              </div>
          </div>

@endsection
