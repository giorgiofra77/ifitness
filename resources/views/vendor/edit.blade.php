@extends('template.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header text-center">{{ __('Modifica fornitore') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-danger" href="javascript:history.back()" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.cancel') }}</a>
                    </div>                   



                    <form method="POST" action="{{ route('vendors.update', $vendor->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="row row-cols-3 mb-4">
                            <div class="col-md-4">
                            <label class="mb-1" for="inputRagsociale">Ragione Sociale *</label>
                                <input type="text" class="form-control @error('ragsociale') is-invalid @enderror" value="{{ old('ragsociale', $vendor->ragsociale) }}" id="inputRagsociale" name="ragsociale" required>
                                @error('ragsociale')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="mb-1" for="inputPiva">Partita IVA</label>
                                    <input type="text" class="form-control @error('piva') is-invalid @enderror" value="{{ old('piva', $vendor->piva)}}" id="inputPiva" name="piva">
                                    @error('piva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            <div class="col-md-4">
                            <label class="mb-1" for="inputRappresentante">Rappresentante</label>
                                <input type="text" class="form-control @error('rappresentante') is-invalid @enderror" value="{{ old('rappresentante', $vendor->rappresentante)}}" id="inputRappresentante" name="rappresentante">
                                @error('rappresentante')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        
                        <div class="row row-cols-3 mb-4">
                            <div class="col-md-4">
                            <label class="mb-1" for="inputPhone">Telefono</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $vendor->phone) }}" id="inputPhone" name="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1" for="inputFax">Fax</label>
                                    <input type="text" class="form-control @error('fax') is-invalid @enderror" id="inputFax" value="{{ old('fax', $vendor->fax) }}" name="fax">
                                    @error('fax')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                            <label class="mb-1" for="inputCell">Cell</label>
                                <input type="text" class="form-control @error('cell') is-invalid @enderror" value="{{ old('cell', $vendor->cell) }}" id="inputCell" name="cell">
                                @error('cell')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                        </div>


                        <div class="row row-cols-3 mb-4">
                            <div class="col-md-6">
                                <label class="mb-1" for="inputAddress">Indirizzo</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="inputAddress" value="{{ old('address', $vendor->address) }}" name="address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="mb-1" for="inputZip">Cap</label>
                                    <input type="text" class="form-control @error('zip') is-invalid @enderror" id="inputZip" value="{{ old('zip', $vendor->zip) }}" name="zip">
                                    @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                       
                            <div class="col-md-3">
                                <label class="mb-1" for="inputCity">Città</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="inputCity" value="{{ old('city', $vendor->city) }}" name="city">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row row-cols-1 mb-4">
                            <div class="col-md-4">
                            <label class="mb-1" for="inputprodotti_trattati">Prodotti trattati</label>
                                <input type="text" class="form-control @error('prodotti_trattati') is-invalid @enderror" id="inputprodotti_trattati" value="{{ old('prodotti_trattati', $vendor->prodotti_trattati) }}" name="prodotti_trattati">
                                @error('prodotti_trattati')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                        </div>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check me-2"></i>{{ __('Modifica') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
