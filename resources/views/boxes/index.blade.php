@extends('template.app')

@section('content')

    <div class="row justify-content-left">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              @include('boxes.nav')
          </div>
            <div class="card-body">
              <h3 class="text-center mb-4">Pacchetti attivi di {{$customer->name}} {{$customer->lastname}}</h3>
              <div class="container">                
                  @isset($boxes)
                  @if (count($boxes) > 0)
                  {{-- <table class="table">
                    <tr>
                      <th>Descrizione pacchetto</th>
                      <th>Prezzo Pacchetto</th>
                      <th>Data creazione</th>
                      <th>Data completamento</th>
                      <th>Dettaglio</th>
                    </tr>
                    @foreach ($boxes as $boxe)
                        <tr class="{{($boxe->completed) ? 'text-decoration-line-through' : ''}}">
                          <td>{{$boxe->box_name}}</td>
                          <td>€ {{$boxe->box_price}}</td>
                          <td>{{ \Carbon\Carbon::create($boxe->created_at)->format('d/m/Y') }}</td>
                          @if ($boxe->completed)
                          <td>{{ \Carbon\Carbon::create($boxe->deleted_at)->format('d/m/Y') }}</td>
                          @else 
                          <td>In corso...</td>
                          @endif
                          @if ($boxe->completed)
                          <td><i class="btn btn-outline-success btn-sm bi bi-check-all disabled"></i></td>
                          @else
                          <td><a href="{{route('boxes.show', $boxe->id)}}" class="link-dark"><i class="btn btn-outline-warning btn-sm bi bi-pencil-square"></i></a></td>
                          @endif
                        </tr>
                    @endforeach
                  </table>
         --}}

                  <table class="table">
                    <tr>
                      <th>Note</th>
                      <th>Descrizione pacchetto</th>
                      <th>Prezzo</th>
                      <th>Data creazione</th>
                      <th>Data completamento</th>
                      <th>Dettaglio</th>
                    </tr>
                  @foreach ($boxes as $boxe)
                  <tr class="{{($boxe->completed) ? 'text-decoration-line-through' : ''}}">

                    <td>
                      <a data-bs-toggle="collapse" data-bs-target="#collapse{{$boxe->id}}" aria-expanded="false" aria-controls="collapseTwo" title="{{$boxe->box_note}}">
                        @if ($boxe->box_note != null)
                        <i class="btn btn-outline-primary btn-sm bi bi-eye-fill"></i>
                        @else
                        <i class="disabled btn btn-outline-secondary btn-sm bi bi-eye-fill"></i>
                        @endif
                      </a>
                    </td>

                  <td>{{$boxe->box_name}}</td>
                  <td>€ {{$boxe->box_price}}</td>
                  <td>{{ \Carbon\Carbon::create($boxe->created_at)->format('d/m/Y') }}</td>
                  @if ($boxe->completed)
                  <td>{{ \Carbon\Carbon::create($boxe->deleted_at)->format('d/m/Y') }}</td>
                  @else 
                  <td>In corso...</td>
                  @endif
                  @if ($boxe->completed)
                  <td><a href="{{route('boxes.show', $boxe->id)}}" class="link-dark"><i class="btn btn-outline-success btn-sm bi bi-check-all"></i></a></td>
                  @else
                  <td><a href="{{route('boxes.show', $boxe->id)}}" class="link-dark"><i class="btn btn-outline-warning btn-sm bi bi-pencil-square"></i></a></td>
                  @endif

                </tr>
                <tr><td colspan="6">
                  @if ($boxe->box_note != null)
                <div class="collapse" id="collapse{{$boxe->id}}">
                  <div class="alert alert-info card card-body">
                    <p>Note:</p>
                    {{ $boxe->box_note }}                    
                  </div>
                  @endif
                </div>
                </td>
                </tr>
                    @endforeach
                    
                    @else
                    <div class="alert alert-light text-center" role="alert">
                      Non ci sono pacchetti attivi!
                    </div>
                    @endif
                  @endisset
              
            </div>
          @if (session('status'))
            <div class="card-footer mb-0 alert alert-success alert-dismissible text-center fade show" role="alert" >
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ (session('status')) }}
            </div>
          @endif
      </div>
    </div>
    </div>
    </div>
@endsection
