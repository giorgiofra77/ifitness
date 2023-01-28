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
            <a class="btn btn-outline-success me-2" href="{{ route('customers.addsell', $customer->id) }}" role="button"><i class="bi bi-coin"></i></a>

          </li>
      </div>

            @if (isset($customer_sells) && count($customer_sells) > 0)
                <h3 class="text-center mt-2">Vendite per {{$customer->name}} {{$customer->lastname}}</h3>
                <table class="table table-hover mt-2">
                    <thead>
                        <tr>
                        <th scope="col">Data vendita</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Prezzo vendita €</th>
                        <th scope="col">Qtà</th>
                        <th scope="col">Totale €</th>
                        <th scope="col">Codice</th>
                        <th></th>
                        </tr>
                    </thead>
                    @foreach ($customer_sells as $item)
                    <tbody>
                        <tr>
                            <td>{{ \Carbon\Carbon::create($item->created_at)->format('d/m/Y') }}</td>
                            <td>{{$item->article->code_desc}}</td>
                            <td>€ {{number_format($item->price_sell, 2, ",")}}</td>
                            <td>{{$item->qta}}</td>
                            <td>€ {{number_format($item->price_sell * $item->qta, 2, ",")}}</td>
                            <td>{{$item->article->barcode}}</td>
                            <td>
                              <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bi bi-gear"></i>
                                </a>
                          
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          
                                  <a class="dropdown-item" href="{{ route('sells.show', $item->id) }}"><i class="bi bi-journal-text me-1"></i>Scheda</a>
                                                    
                                </div>
                              </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table> 
                <div class="pagination justify-content-center">{{ $customer_sells->links() }}</div>          
            @else 
                <div class="pagination justify-content-center mt-4 mb-4"> Nessun prodotto venduto al cliente</div>
            @endif
        </div>
@endsection

