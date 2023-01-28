@extends('template.app')
@section('content')
<div class="row justify-content-left">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Gestione Iscrizioni</div>
        <div class="card-body">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a href="{{ route('subscriptions.create') }}" class="btn btn-outline-primary me-1" role="button" aria-disabled="true" title="{{ __('messages.add')}}"><i class="bi bi-postcard me-1"></i>{{__('messages.add')}}</a>
            </li>
          </ul>
          @if(isset($subscriptions) && count($subscriptions) > 0)
            <table class="table mt-2">
              <thead>
                <tr>
                  <th scope="col">Codice</th>
                  <th scope="col">Descrizione</th>
                    <th scope="col">Prezzo €</th>
                  <th scope="col">Durata Mesi</th>
                  <th scope="col">&nbsp</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($subscriptions as $item)
                    <tr>
                        <td>{{$item->code}}</td>
                        <td>{{$item->descr}}</td>
                        <td>@numeric($item->price)</td>
                        <td>{{$item->months}}</td>
                        <td><a class="btn btn-outline-primary" href="{{route('subscriptions.edit', $item->id)}}" role="button"><i class="bi bi-pencil-square"></i></a></td>

                    </tr>

                @endforeach

              </tbody>

            </table>
            @else
            <div class="d-flex justify-content-center">Non sono inserite tipologie di abbonamento, clicca in alto per aggiungerne una.</div>
            @endif
        </div>


        @if (session('status'))
            <div class='card-footer mb-0 alert alert-{{session('alert_type')}} alert-dismissible text-center fade show' role="alert" >
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
        @endif

    </div>
  </div>
</div>
@endsection
