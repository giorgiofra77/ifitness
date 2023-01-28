@extends('template.app')

@section('content')

    <div class="card text-left">
      <div class="card-header container">
        <ul class="nav nav-pills card-header-pills justify-content-end">
          <li class="nav-item">

          <li class="nav-item">
            <a class="btn btn-danger me-2" href="{{route('customers.show', $customer->id)}}" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.cancel') }}</a>           
          </li>        

          </li>
        </ul>
      </div>
        <div class="card-body">
          <div class="row">
              <div class="col-sm-12">
                <div class="card text-dark mb-3">
                  <div class="card-body">
                    <h2 class="card-title text-center mb-4">Nuova vendita per {{$customer->name}} {{$customer->lastname}}</h2>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                          @if (!isset($articles))
                            <form method="POST" action="{{ route('customers.getAddsell', $customer->id) }}" class="d-flex">
                              @csrf
                              <input class="form-control me-2" type="search" placeholder="{{__('messages.code')}} {{__('messages.desc')}}" aria-label="Search" name="find" required autofocus>
                              <button class="btn btn-outline-success" type="submit">{{__('messages.search')}}</button>
                            </form>                                     
                          @endif

                       </li>
                     </ul>
                  </div>
                </div>
              </div>
          </div>

          @if (isset($articles) && count($articles) > 0)
          <table class="table mt-2">
            <thead>
                <tr>
                  <th scope="col">Codice</th>
                  <th scope="col">Barcode</th>
                  <th scope="col">Descrizione</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Prezzo €</th>
                  <th scope="col">Qtà</th>
                  <th scope="col">&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($articles as $article)
                  <form method="POST" action="{{ route('sellcustomer.store') }}" class="d-flex">
                    @csrf
                      <tr>
                        <td>{{$article->code}}</td>
                        <td>{{$article->barcode}}</td>
                        <td>{{$article->code_desc}}</td>
                        <td>{{$article->stock}}</td>
                        <td><input class="form-control" style="width: 8rem;" step="0.01" type="number" aria-label="Text" value="{{old('price_sell', $article->price_sell)}}" name="price_sell"></td>
                        <input type="hidden" name="move_type" value="unloader">
                        <input type="hidden" name="article_id" value={{$article->id}}>
                        <input type="hidden" name="customer_id" value={{$customer->id}}>
                        <td><input class="form-control" style="width: 8rem;" type="number" placeholder="Quantità da scaricare" aria-label="Text" value="{{old('qta', 1)}}" name="qta" required autofocus>
                        </td>
                        <td>
                          <button type="submit" class="btn btn-outline-danger" role="button" aria-disabled="true"><i class="bi bi-file-earmark-minus-fill me-1"></i>Scarico</button>
                        </td>
                      </tr>
                  </form>
                @endforeach
            </tbody>
          </table>
          @endif

          @if (session('status'))
            <div class="card-footer mb-0 alert alert-success alert-dismissible text-center fade show" role="alert" >
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ (session('status')) }}
            </div>
          @endif
        </div>
@endsection
