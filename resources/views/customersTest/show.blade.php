@extends('template.app')

@section('content')

    <div class="card text-left">
      <div class="card-header container">
        <ul class="nav nav-pills card-header-pills justify-content-end">
          <li class="nav-item">
            <a class="btn btn-danger me-2" href="{{ route('test-customer.index', $test->customer_id) }}" role="button">
                <i class="bi bi-backspace me-2"></i>{{ __('messages.back') }}</a>
          </li>
        <li>
        <a href="{{route('test.edit', $test->id)}}" class="btn btn-outline-primary me-2"><i class="bi bi-pencil-square"></i></a>
        </li>
          <li class="nav-item">
            <a href="#" class="btn btn-outline-danger me-2" role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#confirmModal"><i class="bi bi-trash"></i></a>
          </li>
        </ul>
      </div>

        <!-- Modal -->
        <form method="POST" action="{{ route('test.destroy', $test->id) }}">
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
                  Sei sicuro di voler eliminare il test?
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

            <h5 class="card-title">Dati test di soglia di {{$test->customer->fullname}}</h5>
              <div class="row">

                <div class="col-sm-6">
                  <div class="card text-dark bg-light mb-3">
                    <div class="card-body text-left">
                        <p class="card-text">{{__('Data del test')}}: @date($test->date_test) </p>
                        <p class="card-text">{{__('Peso atleta')}}: {{ $test->weight .' Kg' }}</p>
                        <p class="card-text">{{__('Watt alla soglia')}}: {{ $test->threshold_watt .' Watt'}}</p>
                        <p class="card-text">{{__('Watt massimali')}}: {{ $test->max_watt . ' Watt' }}</p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="card text-dark bg-info mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Note</h5>
                      <p class="card-text">{{ $test->note_test }}</p>
                    </div>
                  </div>
                </div>

              </div>

          </div>
        <x-alert/>
@endsection
