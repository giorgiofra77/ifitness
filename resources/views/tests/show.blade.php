@extends('template.app')

@section('content')

    <div class="card text-left">
      <div class="card-header container">
        <ul class="nav nav-pills card-header-pills justify-content-end">
          <li class="nav-item">
            <a class="btn btn-outline-danger me-2" href="{{ route('tests.index') }}"><i class="bi bi-backspace-fill me-1"></i>Indietro</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('test.edit', $test->id) }}" class="btn btn-outline-primary me-2"><i class="bi bi-pencil-square"></i></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tests.destroy', $test->id) }}" class="btn btn-outline-danger me-2" role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#confirmModal"><i class="bi bi-trash"></i></a>
          </li>
        </ul>
      </div>

        <!-- Modal -->
        <form method="POST" action="{{ route('tests.destroy', $treatment->id) }}">
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
                  Sei sicuro di voler eliminare il trattamento?
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

            <h5 class="card-title">{{$treatment->desc}}</h5>
              <div class="row">

                <div class="col-sm-6">
                  <div class="card text-dark bg-light mb-3">
                    <div class="card-body text-left">
                      <h5 class="card-title">Dati trattamento</h5>
                      <p class="card-text">{{__('Codice')}}: {{ $treatment->code}}</p>
                      <p class="card-text">{{__('Descrizione')}}: {{ $treatment->desc }}</p>
                      <p class="card-text">{{__('Durata')}}: {{ $treatment->durata }}</p>
                      <p class="card-text">{{__('Prezzo €')}}: {{ $treatment->price }}</p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="card text-dark bg-info mb-3">
                    <div class="card-body">
                      <h5 class="card-title">{{ $treatment->note }}</h5>
                      <p class="card-text"></p>
                    </div>
                  </div>
                </div>

              </div>
          </div>

@endsection
