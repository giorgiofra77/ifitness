@extends('template.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header text-center">{{ __('Modifica tipologia abbonamento') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-danger" href="{{ route('subscriptions.index') }}" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.cancel') }}</a>
                    </div>

                    <form method="POST" action="{{ route('subscriptions.update', $subscription->id) }}">
                        @csrf
                        @method('patch')
                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputCode">Codice *</label>
                            <input type="text" max="25" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $subscription->code) }}" name="code" required>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Descrizione *</label>
                                <input type="text" class="form-control @error('descr') is-invalid @enderror" value="{{ old('descr', $subscription->descr) }}" name="descr" required>
                                @error('descr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputPriceCost">Prezzo € *</label>
                            <input type="number" step="1" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $subscription->price) }}" name="price" required>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputPriceCost">Durata (mesi) *</label>
                                <input type="number" step="1" class="form-control @error('months') is-invalid @enderror" value="{{ old('months', $subscription->months) }}" name="months" required>
                                @error('months')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check me-1"></i>{{ __('Modifica') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
