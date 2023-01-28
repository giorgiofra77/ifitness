@extends('template.app')

@section('content')
<div class="row justify-content-left">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Gestione articoli</div>
        <div class="card-body">
          <ul class="nav justify-content-end">
            <button type="button" class="btn btn-outline-primary me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Articoli
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item link-danger" href="{{ route('articles.all', 'outstock') }}">Esauriti</a></li>
              <li><a class="dropdown-item link-warning" href="{{ route('articles.all', 'understock') }}">Sotto scorta</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item link-primary" href="{{ route('articles.all') }}">Tutti</a></li>
              {{-- <li><a class="dropdown-item" href="#">Separated link</a></li> --}}
            </ul>
            <li class="nav-item">
              <a href="{{ route('articles.create') }}" class="btn btn-outline-primary me-2" role="button" aria-disabled="true" title="{{ __('messages.add')}}"><i class="bi bi-bag-plus-fill"></i></a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('articles.find') }}" class="d-flex">
                  @csrf
                  <input class="form-control me-2" type="search" placeholder="{{__('messages.code')}} {{__('messages.desc')}}" aria-label="Search" name="find" required autofocus>
                  <button class="btn btn-outline-success" type="submit">{{__('messages.search')}}</button>
                </form>
            </li>
          </ul>

          @isset($articles)
            <table class="table mt-2">
              <thead>
                <tr>
                  <th scope="col">Codice</th>
                  <th scope="col">Barcode</th>
                  <th scope="col">Descrizione</th>
                  <th scope="col">Prezzo acquisto</th>
                  <th scope="col">Prezzo vendita</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Sotto Scorta</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($articles as $article)
                    @include('articles.list')
                @endforeach

              </tbody>

            </table>

              @if( method_exists($articles,'links') )
                <div class="pagination justify-content-center">{{ $articles->links() }}</div>
              @endif 
              


            @endisset
        </div>

        
      @if (session('status'))
        <div class="card-footer mb-0 alert {{session('alert_type')}} alert-dismissible text-center fade show {{ $alert_type ?? '' }}" role="alert" >
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ (session('status')) }}
        </div>
      @endif


    </div>
  </div>
</div>
@endsection
