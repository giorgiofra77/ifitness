@extends('template.app')

@section('content')

    <div class="card text-left">
      <div class="card-header container">
        <ul class="nav nav-pills card-header-pills justify-content-end">
          <li class="nav-item me-2">
            {{-- <a class="btn btn-danger" href="{{route('customers.show', $customer->id)}}" role="button"><i class="bi bi-backspace-fill me-1"></i>{{ __('messages.back') }}</a> --}}
            <a class="btn btn-danger" href="javascript:history.back()" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.back') }}</a>

          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#treatmentModal">
              <i class="bi bi-brush"></i>
            </button>
            {{-- Modal per inserimento trattamento --}}
            @include('customers.addtreatmentmodal')

          </li>
      </div>

        <!-- Modal -->
        <form method="POST" action="{{ route('customers.destroy', $customer->id) }}">
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
                  Sei sicuro di voler eliminare il cliente?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                  <button type="submit" class="btn btn-danger">Si! Elimina!</button>
                </div>
              </div>
            </div>
          </div>
        </form>


            @if (isset($customer_treatments)&& count($customer_treatments) > 0)
                <h3 class="text-center mt-2">Trattamenti di {{$customer->name}} {{$customer->lastname}}</h3>
                <table class="table table-hover mt-2">
                    <thead>
                        <tr>
                        <th scope="col">Codice</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Prezzo fatto</th>
                        <th scope="col">Acconto</th>
                        <th scope="col">Note</th>
                        <th scope="col">Data trattamento</th>
                        <th></th>
                        </tr>
                    </thead>
                    @foreach ($customer_treatments as $item)
                    <tbody>
                        <tr>
                            <th scope="row">{{$item->treatment->code}}</th>
                            <td>{{$item->treatment->desc}}</td>
                            <td>€ {{$item->treatment->price}}</td>
                            <td>€ {{$item->treatment_price}}</td>
                            <td>€ {{$item->acconto}}</td>
                            <td>{{$item->note}}</td>
                            <td>{{ \Carbon\Carbon::create($item->created_at)->format('d/m/Y') }}</td>
                            <td>
                              <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bi bi-gear"></i>
                                </a>
                          
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          
                                  <a class="dropdown-item" href="{{ route('treatmentcustomer.show', $item->id) }}"><i class="bi bi-journal-text me-1"></i>Scheda</a>
                          
                                  <a class="dropdown-item" href="{{ route('treatmentcustomer.edit', $item->id) }}"><i class="bi bi-pencil-square me-1"></i>Modifica</a>
                          
                                </div>
                              </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table> 
                <div class="pagination justify-content-center">{{ $customer_treatments->links() }}</div>          
            @endif
        </div>
@endsection

