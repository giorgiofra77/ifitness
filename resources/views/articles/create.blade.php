@extends('template.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header text-center">{{ __('Inserisci articolo') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-danger" href="{{ route('articles.index') }}" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.cancel') }}</a>
                    </div>                   



                    <form method="POST" action="{{ route('articles.store') }}">
                        @csrf
                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputVendor">Fornitore</label>
                            <select class="form-select @error('vendor_id') is-invalid @enderror" aria-label="Default select example" name="vendor_id" required>
                                <option selected value=""></option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{$vendor->id}}">{{$vendor->ragsociale}}</option>                     
                                @endforeach

                              </select>
                                @error('vendor_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputCode">Codice *</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" id="inputCode" name="code" required>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputBarcode">Barcode</label>
                                <input type="text" class="form-control @error('barcode') is-invalid @enderror" value="{{ old('barcode') }}" id="inputBarcode" name="barcode">
                                @error('barcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Descrizione *</label>
                                <input type="text" class="form-control @error('code_desc') is-invalid @enderror" value="{{ old('code_desc') }}" id="inputDesc" name="code_desc" required>
                                @error('code_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputPriceCost">Prezzo acquisto €</label>
                                <input type="number" step="0.01" class="form-control @error('price_cost') is-invalid @enderror" value="{{ old('price_cost', 0) }}" " id="inputPriceCost" name="price_cost">
                                @error('price_cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputPriceSell">Prezzo vendita €</label>
                                <input type="number" step="0.01" class="form-control @error('price_sell') is-invalid @enderror" value="{{ old('price_sell', 0) }}" " id="inputPriceSell" name="price_sell">
                                @error('price_sell')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputunder_stock">Valore sotto scorta</label>
                                <input type="text" class="form-control @error('under_stock') is-invalid @enderror" value="{{ old('under_stock') }}" "  id="inputunder_stock" name="under_stock">
                                @error('under_stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check me-2"></i>{{ __('Conferma') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
