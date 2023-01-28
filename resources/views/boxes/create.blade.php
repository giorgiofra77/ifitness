@extends('template.app')

@section('content')

    <div class="row justify-content-left">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Gestione pacchetti</div>
              @include('boxes.nav')
            <div class="card-body">
              <div class="d-flex p-2 fs-3 bd-highlight justify-content-center mb-3">Pacchetti di {{$customer->name}} {{$customer->lastname}}</div>
              <div class="container">
                
                  @isset($boxes)
                  @if (count($boxes) > 0)
                    <div id="app">
                      <box-component :boxes="{{ $boxes }}" :treatments="{{ $treatments }}"></box-component>
                    </div>
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
