@extends('template.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-center">{{ __('Inserisci trattamento') }}</div>
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-danger" href="{{ route('tests.index') }}" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.cancel') }}</a>
                    </div>
                    <form method="POST" action="{{ route('tests.store') }}">
                        @csrf
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
                            <label class="mb-1" for="inputDesc">Descrizione *</label>
                                <input type="text" class="form-control @error('desc') is-invalid @enderror" value="{{ old('desc') }}" id="inputDesc" name="desc" required>
                                @error('code_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Durata</label>
                                <input type="text" class="form-control @error('durata') is-invalid @enderror" value="{{ old('durata') }}" id="inputDesc" name="durata">
                                @error('durata')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Prezzo €</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" id="inputDesc" name="price">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="mb-1" for="inputDesc">Note</label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror" value="{{ old('note') }}" id="inputDesc" name="note">
                                @error('note')
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
