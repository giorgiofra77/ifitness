@extends('template.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header text-center">{{ __('Inserisci nuovo tipologia abbonamento') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-danger" href="{{ route('subscriptions.index') }}" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.cancel') }}</a>
                    </div>

                    <form method="POST" action="{{ route('subscriptions.store') }}">
                        @csrf
                        <input type="hidden" id="inputAccount_id" class="form-control @error('account_id') is-invalid @enderror" value="{{ old('account_id', Auth::user()->account_id) }}"  name="account_id" required>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputCode">Codice *</label>
                            <input type="text" id="inputCode" max="25" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" placeholder="Indicare per esempio ABB12Mesi" name="code" required>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Descrizione *</label>
                                <input type="text" id="inputDesc" class="form-control @error('descr') is-invalid @enderror" value="{{ old('descr') }}" placeholder="Indicare per esempio Abbonamento annuale" name="descr" required>
                                @error('descr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputMonth">Durata (mesi) *</label>
                                <input type="number" id="inputMonth" step="1" class="form-control @error('months') is-invalid @enderror"
                                       value="{{ old('months') }}" name="months" placeholder="Indicare il valore in mesi" required>
                                @error('months')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputPriceCost">Prezzo € *</label>
                            <input type="number" id="inputPriceCost" step="1" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', 0) }}" name="price" required>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check me-1"></i>{{ __('Conferma') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
