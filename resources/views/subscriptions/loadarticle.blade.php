@extends('template.app')

@section('content')
<div class="row justify-content-left">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Gestione articoli</div>
        <div class="card-body">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a href="{{ route('articles.all', 'outstock') }}" class="btn btn-outline-danger me-2" role="button" aria-disabled="true" title="{{ __('messages.out_of_stock')}}"><i class="bi bi-slash-circle-fill"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{ route('articles.all', 'understock') }}" class="btn btn-outline-warning me-2" role="button" aria-disabled="true" title="{{ __('messages.under_stock')}}"><i class="bi bi-node-minus-fill"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{ route('articles.all') }}" class="btn btn-outline-primary me-2" role="button" aria-disabled="true" title="{{ __('messages.show_all')}}"><i class="bi bi-boxes"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{ route('articles.create') }}" class="btn btn-outline-primary me-2" role="button" aria-disabled="true" title="{{ __('messages.add')}}"><i class="bi bi-bag-plus-fill"></i></a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('articles.find') }}" class="d-flex">
                  @csrf
                  <input class="form-control me-2" type="search" placeholder="{{__('messages.code')}} {{__('messages.desc')}}" aria-label="Search" name="find" required>
                  <button class="btn btn-outline-success" type="submit">{{__('messages.search')}}</button>
                </form>
            </li>
          </ul>

          @isset($article)
            <table class="table mt-2">
              <thead>
                <tr>
                  <th scope="col">Codice</th>
                  <th scope="col">Barcode</th>
                  <th scope="col">Descrizione</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Quantità</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>

              <tbody>

                    @switch($move_type)
                        @case('load')
                            @include('warehouse.list_loader')
                            @break
                        @case('unload')
                            @include('warehouse.list_unloader')
                            @break
                        @default
                    @endswitch


              </tbody>

            </table>
          @endif
        </div>

    </div>
  </div>
</div>
@endsection
