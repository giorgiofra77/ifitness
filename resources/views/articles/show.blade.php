@extends('template.app')

@section('content')

    <div class="card text-left">
      <div class="card-header container">
        <ul class="nav nav-pills card-header-pills justify-content-end">
          <li class="nav-item">
            <a class="btn btn-outline-success me-2" href="#"><i class="bi bi-brush"></i></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-primary me-2"><i class="bi bi-pencil-square"></i></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('articles.destroy', $article->id) }}" class="btn btn-outline-danger me-2" role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#confirmModal"><i class="bi bi-trash"></i></a>
          </li>
        </ul>
      </div>

        <!-- Modal -->
        <form method="POST" action="{{ route('articles.destroy', $article->id) }}">
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
                  Sei sicuro di voler eliminare l'articolo?
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

            <h5 class="card-title">{{$article->code_desc}}</h5>
              <div class="row">

                <div class="col-sm-6">
                  <div class="card text-dark bg-light mb-3">
                    <div class="card-body text-left">
                      <h5 class="card-title">Dati articolo</h5>
                      <p class="card-text">{{__('Fornitore')}}: {{ $article->vendor->ragsociale}}</p>
                      <p class="card-text">{{__('Codice')}}: {{ $article->code}}</p>
                      <p class="card-text">{{__('Codice a barre')}}: {{ $article->barcode}}</p>
                      <p class="card-text">{{__('Descrizione')}}: {{ $article->code_desc }}</p>
                      <p class="card-text">{{__('Prezzo acquisto €')}}: {{ $article->price_cost }}</p>
                      <p class="card-text">{{__('Prezzo di vendita €')}}: {{ $article->price_sell }}</p>
                      <p class="card-text">{{__('Giacenza')}}: {{ $article->stock}}</p>
                      <p class="card-text">{{__('Sotto scorta')}}: {{ $article->under_stock}}</p>                      
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="card text-dark bg-info mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Vendite</h5>
                      <p class="card-text"></p>
                    </div>
                  </div>
                </div>

              </div>
          </div>

@endsection
